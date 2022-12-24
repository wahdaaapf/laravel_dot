<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use Livewire\Component;

class AdminEditMajorComponent extends Component
{
    public $major, $major_id;

    public function mount()
    {
        $major = Major::find($this->major_id);
        $this->major = $major->class;
    }

    public function editMajor(){
        $major = Major::find($this->major_id);
        $major->class = $this->major;
        $major->save();
        session()->flash('ok', 'Success Updated');
        return redirect('admin/majors');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-major-component');
    }
}
