<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back(); 
            }
        }
        else
        {
                return redirect('login'); 
        }
    }

    public function upload(Request $request)
    {
        $doctor=new doctor;

        $image=$request->file;

    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->file->move('doctorimage',$imagename);

    $doctor->image=$imagename;

    $doctor->name=$request->name;

    $doctor->phone=$request->number;

    $doctor->speciality=$request->speciality;

    $doctor->address=$request->address;

    $doctor->save();

    return redirect()->back()->with('message','Doctor Added Successfully');
    
    }

    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {   
                $data=appointment::all();
                return view('admin.showappointment',compact('data'));
            }
            else
            {
                return redirect()->back(); 
            }
        }
        else
        {
                return redirect('login'); 
        }
    }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }
    
    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=doctor::all();
                return view('admin.showdoctor',compact('data'));
            }
            else
            {
                return redirect()->back(); 
            }
        }
        else
        {
                return redirect('login'); 
        }
    }

    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    public function updatedoctor($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=doctor::find($id);
                return view('admin.update_doctor',compact('data'));
            }
            else
            {
                return redirect()->back(); 
            }
        }
        else
        {
                return redirect('login'); 
        }
    }

    public function editdoctor(Request $request , $id)
    {
        $doctor=doctor::find($id);

        $doctor->name=$request->name;

        $doctor->phone=$request->number;

        $doctor->speciality=$request->speciality;

        $doctor->address=$request->address;

        $image=$request->file;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('doctorimage',$imagename);

            $doctor->image=$imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Edited Successfully');
    }
    
    
}
