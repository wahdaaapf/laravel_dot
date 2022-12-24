<?php

namespace App\Http\Livewire\Admin;

use App\Models\Major;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMajorsComponent extends Component
{
    use WithPagination;

    public function deleteMajor($id)
    {
        $major = Major::find($id);
        $major->delete();
        session()->flash('ok', 'Success Deleted');
    }

    public function render()
    {
        $majors = Major::orderBy('class', 'ASC')->paginate(7);
        // return response()->json($majors);
        return view('livewire.admin.admin-majors-component', ['majors'=>$majors]);
    }
}
