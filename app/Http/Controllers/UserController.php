<?php

namespace App\Http\Controllers;

use App\Mail\VerifyUser as MailVerifyUser;
use App\Mail\VerifyUser;
use App\Mail\userforogotpassword;
use App\Models\category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Pagination\Paginator;
use Spatie\Browsershot\Browsershot;


class UserController extends Controller
{
    //
    function welcome()
    {
        $categories = category::withCount('quizzes')->orderBy('quizzes_count','desc')->take(5)->get();
        $quizdata = Quiz::withCount('Records')->orderBy('records_count','desc')->take(5)->get();
        return view('welcome', ['categories' => $categories,'quizdata'=>$quizdata]);
    }
    public function categories()
{
    $categories = Category::withCount('quizzes')
        ->orderBy('quizzes_count', 'desc')
        // ->paginate(1)
        ->get(); // Yajra DataTables ke liye best

    return view('categories-list', compact('categories'));
}

    //public function categories()
    //{
        // Get categories with quiz count and order by quiz count (desc)
      //  $categories = Category::withCount('quizzes')
      //      ->orderBy('quizzes_count', 'desc')
      //      ->paginate(1); // Show 3 per page

        // Return to view
      //  return view('categories-list', ['categories' => $categories]);
    //}

    function userquizlist($id, $category)
    {
        $quizdata = Quiz::withCount('Mcq')->where('category_id', $id)->get();
        return view('user-quiz-list', [
            "quizdata" => $quizdata,
            "category" => $category
        ]);
    }
    function startquiz($id, $name)
    {
        $quizcount = Mcq::where('quiz_id', $id)->count();
        $mcqs = Mcq::where('quiz_id', $id)->get();
        Session::put('firstmcq', $mcqs[0]);
        $quizname = $name;
        return view('user-start-quiz', [
            "quizcount" => $quizcount,
            "quizname" => $quizname
        ]);
    }
    public function usersignup(Request $request)
    {
        // Validation
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        // Insert User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
       $link = Crypt::encryptString($user->email);
       $link = url('/verify-user/'.$link);
       Mail::to($user->email)->send(new VerifyUser($link));

        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message-success', "User registered successfully, please check email to verify account");
            }
            return redirect('/')->with('message-success', "User registered successfully, please check email to verify account");
        }
    }
    function userlogout()
    {
        Session::forget('user');
        return redirect('/');
    }
    function quizstart()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }
    public function userlogin(Request $request)
    {
        // Validation
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // yaha spelling sahi kar di hai
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect('user-login')->with('message-error', "Invalid credentials. Please try again!");
        }

        Session::put('user', $user);

        if (Session::has('quiz-url')) {
            $url = Session::get('quiz-url');
            Session::forget('quiz-url');
            return redirect($url)->with('message', "User Login successfully");
        }

        return redirect('/')->with('message', "User Login successfully");
    }

    function userloginquiz()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-login');
    }
    function mcq($id, $name)
{
    $firstMcq = Session::get('firstmcq');

    if (!$firstMcq) {
        return redirect()->back()->with('error', 'No quiz found. Please start quiz again.');
    }

    $record = new Record();
    $record->user_id = Session::get('user')->id;
    $record->quiz_id = $firstMcq->quiz_id;  // ✅ FIXED
    $record->status  = 1;

    if ($record->save()) {
        $currentquiz = [];
        $currentquiz['totalmcq']   = Mcq::where('quiz_id', $firstMcq->quiz_id)->count();
        $currentquiz['currentmcq'] = 1;
        $currentquiz['quizname']   = $name;
        $currentquiz['id']         = $firstMcq->quiz_id;
        $currentquiz['recordid']         = $record->id;

        Session::put('currentquiz', $currentquiz);

        $mcqdata = Mcq::find($id);

        return view('mcq-page', [
            'quizname' => $name,
            'mcqdata'  => $mcqdata
        ]);
    } else {
        return "something went wrong";
    }
}

    function submitnext(Request $request, $id)
{
    $request->validate([
        'answer' => 'required'
    ]);

    $currentquiz = Session::get('currentquiz');

    // Next MCQ laane ke liye query
    $mcqdata = Mcq::where([
        ['id', '>', $id],
        ['quiz_id', '=', $currentquiz['id']]
    ])->first();

    // Check if already answered
    $isExist = MCQ_Record::where([
        ['record_id', '=', $currentquiz['recordid']],
        ['mcq_id', '=', $id],
    ])->count();

    if ($isExist < 1) {
        $mcq_record = new MCQ_Record();
        $mcq_record->record_id     = $currentquiz['recordid'];
        $mcq_record->user_id       = Session::get('user')->id;
        $mcq_record->mcq_id        = $id;
        $mcq_record->select_answer = $request->input('answer');

        // ✅ Correct answer check
        $correctAns = Mcq::find($id)->correct_ans;
        $mcq_record->is_correct = (strtolower($request->answer) == strtolower($correctAns)) ? 1 : 0;

        $mcq_record->save();

        // ✅ Sirf naya record banta hai tabhi increment
        $currentquiz['currentmcq'] += 1;

        // ✅ Status update
        $record = Record::find($currentquiz['recordid']);
        if ($record) {
            if ($mcqdata) {
                $record->status = 1; // In Progress
            } else {
                $record->status = 2; // Completed
            }
            $record->save();
        }
    }

    // Session update
    Session::put('currentquiz', $currentquiz);

    if ($mcqdata) {
        return view('mcq-page', [
            'quizname' => $currentquiz['quizname'],
            'mcqdata'  => $mcqdata
        ]);
    } else {
        $resultData = MCQ_Record::WithMCQ()->where('record_id',$currentquiz['recordid'])->get();
        $correctAns = MCQ_Record::where([
            ['record_id','=',$currentquiz['recordid']],
            ['is_correct','=',1],
        ])->count();
        return view('quiz-result',['resultData'=>$resultData,'correctAns'=>$correctAns]);
    }
}


   public function userdetails() {
    $quizrecord = Record::withQuiz()->where('user_id', Session::get('user')->id)->get();
    return view('user-details',['quizrecord'=>$quizrecord]);
}

    function searchquiz(Request $request){
        $quizdata = Quiz::withCount('Mcq')-> where('name','Like','%'.$request->search.'%')->get();
        return view('user-quiz-search',['quizdata'=>$quizdata,'quiz'=>$request->search]);
    }
    function verifyUser($email){
        $oremail= Crypt::decryptString($email);
        $user = User::where('email',$oremail)->first();
        if($user){
            $user->active=2;
            if($user->save()){
                return redirect('/')->with('message-success', "User Verified Successfully");
            }
        }
    }
    function userforgotpassword(Request $request){
        $link = Crypt::encryptString($request->email);
       $link = url('/user-forgot-password/'.$link);
       Mail::to($request->email)->send(new userforogotpassword($link));
        return redirect('/')->with('message-success', "please check email to set new password");

    }
   public function userresetforgotpassword($email)
{
    $oremail = Crypt::decryptString($email);
    return view('user-set-forgot-password', ['email' => $oremail]);
}
   function usersetpassword(Request $request){
     // Validation
        $request->validate([
            'email'    => 'required|email|',
            'password' => 'required|min:3|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            $user->password = Hash::make($request->password);
           if($user->save()){
            return redirect('user-login')->with('message-success', "New password is set, Please login with new password");
           }
        }
   }
   function certificate(){
    $data=[];
    $data['quiz'] = str_replace('-',' ',Session::get('currentquiz')['quizname']);
    $data['name'] = Session::get('user')['name'];
    return view('certificate',['data'=>$data]);
   }
}
