<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use Livewire\Component;

class AdminAddMajorComponent extends Component
{
    public $major;

    public function storeMajor(){
        $major = new Major();
        $major->class = $this->major;
        $major->save();
        session()->flash('ok', 'Success Added');
        // return response()->json($major);
        return redirect('admin/majors');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-major-component');
    }
}
