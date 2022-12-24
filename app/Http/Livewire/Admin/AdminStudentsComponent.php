<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStudentsComponent extends Component
{
    use WithPagination;

    public function deleteStudent($id)
    {
        $major = Student::find($id);
        $major->delete();
        session()->flash('ok', 'Success Deleted');
    }

    public function render()
    {
        $students = Student::orderBy('name', 'ASC')->paginate(7);
        return view('livewire.admin.admin-students-component', ['students'=>$students]);
    }
}
