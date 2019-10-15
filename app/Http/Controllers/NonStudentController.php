<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Usa_state;
use App\Country;
use App\Nonstudent_payment;
use App\Score;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class NonStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.non_student.index');
    }

    public function nonStudentPaymentList(){
             return Datatables::of(Nonstudent_payment::query())
             ->editColumn('action', function(Nonstudent_payment $st) {
                    return '<a class="btn btn-info" href='.route('nonstudent_payments.edit',$st->id).'>Edit</a>';
                })
             ->editColumn('student_id', function(Nonstudent_payment $st) {
                    return $st->student_info['firstname'] .' '.$st->student_info['lastname'];
                })

             ->escapeColumns([])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recent_year = Carbon::now()->year;
        $recent_month = Carbon::now()->month;
        $recent_day = Carbon::now()->day;
        $data = [
            'recent_year'=>$recent_year,
            'recent_month'=>$recent_month,
            'recent_day'=>$recent_day,
        ];
        return view('admin.non_student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Nonstudent_payment();

        $this->validate($request, [
            'student'=>'required',
            'payment_status'=>'required',
            'expire_date'=>'required',

        ]);
        $ex_date = $request->expire_date['year'].'-'.$request->expire_date['month'].'-'.$request->expire_date['day'];

        $student->student_id = $request->student;
        $student->payment_status = $request->payment_status;
        $student->payment_date = Carbon::now();
        $student->expire_date = $ex_date;
        $student->save();

        return redirect()->route('nonstudent_payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Nonstudent_payment::find($id);
        $expire_date = $student->expire_date;
        $ex_date = explode('-', $expire_date);
        $data = [
            'recent_year'=>$ex_date[0],
            'recent_month'=>$ex_date[1],
            'recent_day'=>$ex_date[2],
            'student'=>$student,
        ];
        return view('admin.non_student.edit', $data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Nonstudent_payment::find($id);
        $this->validate($request, [
            'student'=>'required',
            'payment_status'=>'required',
            'expire_date'=>'required',

        ]);
        $ex_date = $request->expire_date['year'].'-'.$request->expire_date['month'].'-'.$request->expire_date['day'];

        $student->student_id = $request->student;
        $student->payment_status = $request->payment_status;
        $student->expire_date = $ex_date;
        $student->update();

        return redirect()->route('nonstudent_payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
