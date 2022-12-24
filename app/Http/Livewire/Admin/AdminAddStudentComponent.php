<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddStudentComponent extends Component
{
    use WithFileUploads;

    public $student, $major = '1', $gender, $img, $imgnm;

    public function storeStudent(){
        $student = new Student();
        $student->name = $this->student;
        $student->class_id = $this->major;
        $student->gender = $this->gender;
        $imgnm = Carbon::now()->timestamp.'.'.$this->img->extension();
        $this->img->storeAs('siswa', $imgnm);
        $student->image = $imgnm;
        $student->save();
        session()->flash('ok', 'Success Added');
        return redirect('admin/students');
    }

    public function render()
    {
        $class = Major::orderBy('class','ASC')->get();
        return view('livewire.admin.admin-add-student-component',['clss'=>$class]);
    }
}
