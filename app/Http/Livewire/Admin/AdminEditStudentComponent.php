<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditStudentComponent extends Component
{
    use WithFileUploads;

    public $student, $major = '1', $gender, $img, $imgnm, $nwimg, $student_id;

    public function mount()
    {
        $student = Student::find($this->student_id);
        $this->student = $student->name;
        $this->major = $student->class_id;
        $this->gender = $student->gender;
        $this->img = $student->image;
    }

    public function editStudent(){
        $student = Student::find($this->student_id);
        $student->name = $this->student;
        $student->class_id = $this->major;
        $student->gender = $this->gender;
        if($this->nwimg)
        {
            unlink('assets/siswa/'.$student->image);
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwimg->extension();
            $this->nwimg->storeAs('siswa', $imgnm);
            $student->image = $imgnm;
        }
        $student->save();
        session()->flash('ok', 'Success Added');
        return redirect()->route('admin.students');
    }

    public function render()
    {
        $class = Major::orderBy('class','ASC')->get();
        return view('livewire.admin.admin-edit-student-component',['clss'=>$class]);
    }
}
