<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // Validate input fields
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        // Check user by admin_email & password
        $admin = Admin::where('admin_email', $request->email)
            ->where('password', $request->password)
            ->first();

        // If user not found
        if (!$admin) {
            return back()->withErrors([
                'login_error' => 'Invalid email or password.',
            ])->withInput();
        }
        session::put('admin', $admin);
        // If login successful, return admin view with email
        return redirect('dashboard');
    }
    function dashboard()
    {
        $admin = session::get('admin');
        if ($admin) {
            $users=User::get();
            return view('admin', ["email" => $admin->admin_email,'users'=>$users]);
        } else {
            return redirect('admin-login');
        }
    }
    function categories()
    {
        $categories = category::get();
        $admin = session::get('admin');
        if ($admin) {
            return view('categories', ["email" => $admin->admin_email, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }
    function logout()
    {
        session::forget('admin');
        return redirect('admin-login');
    }
    function addcategory(Request $request)
    {
        $admin = session::get('admin');

        if (!$admin) {
            return redirect('admin-login')->withErrors(['login_error' => 'Session expired. Please log in again.']);
        }

        $request->validate([
            'category' => 'required|string|max:255|unique:categories,name'
        ]);

        $category = new category();
        $category->name = $request->category;
        $category->creator = $admin->admin_email;

        if ($category->save()) {
            return redirect()->back()->with('success', 'Category added successfully.');
        }

        return redirect()->back()->withErrors(['error' => 'Something went wrong!']);
    }
    function deletecategory($id)
    {
        $isDeleted = category::find($id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success', 'Category Deleted.');
        }
    }

    public function addquiz(Request $request)
    {
        $admin = Session::get('admin');
        $categories = Category::get();
        $totalmcq = 0;

        if ($admin) {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                    'quiz' => 'required|string|max:255 |unique:quizzes,name',
                    'category_id' => 'required|exists:categories,id',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                if (!Session::has('quizdetails')) {
                    $quiz = new Quiz();
                    $quiz->name = $request->quiz;
                    $quiz->category_id = $request->category_id;

                    if ($quiz->save()) {
                        Session::put('quizdetails', $quiz);
                    }
                }
            }


            if (Session::has('quizdetails')) {
                $quiz = Session::get('quizdetails');
                $totalmcq = mcq::where('quiz_id', $quiz->id)->count();
            }

            return view('add-quiz', [
                "email" => $admin->admin_email,
                "categories" => $categories,
                "totalmcq" => $totalmcq
            ]);
        } else {
            return redirect('admin-login');
        }
    }


    public function addmcqs(Request $request)
    {
        $quiz = Session::get('quizdetails');
        $admin = Session::get('admin');

        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'correct_ans' => 'required|in:a,b,c,d',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mcq = new mcq();
        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;
        $mcq->admin_id = $admin->admin_id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $request->category_id;

        if ($mcq->save()) {
            if ($request->submit == "Add More") {
                return redirect()->back()->with('success', 'MCQ added');
            } else {
                Session::forget('quizdetails');
                return redirect('/admin-categories')->with('success', 'Quiz and MCQs saved successfully!');
            }
        }
    }
    function endquiz()
    {
        Session::forget('quizdetails');
        return redirect('/admin-categories');
    }
    public function showquiz($id, $quizName)
    {
        $admin = session::get('admin');
        $mcqs = mcq::where('quiz_id', $id)->get();

        if ($admin) {
            return view('show-quiz', [
                "email" => $admin->admin_email,
                "mcqs" => $mcqs,
                "quizName" => $quizName
            ]);
        } else {
            return redirect('admin-login');
        }
    }

    function quizlist($id, $category)
    {
        $admin = session::get('admin');
        if ($admin) {
            $quizdata = Quiz::where('category_id', $id)->get();
            return view('quiz-list', [
                "email" => $admin->admin_email,
                "quizdata" => $quizdata,
                "category" => $category
            ]);
        } else {
            return redirect('admin-login');
        }
    }
}
