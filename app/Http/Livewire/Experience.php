<?php

namespace App\Http\Livewire;

use Livewire\Component;
//use Livewire\WithPagination;
use App\Models\WorkExperience;

class Experience extends Component
{

    //use WithPagination;

    public $organization, $role, $responsilibities, $startdate, $enddate, $achievements, $reason, $present, $modelId;
    public $isModalOpen = false;
    public $isModalDelete = false;
    


    public function getExp()
    {
        return WorkExperience::where('user_id', auth()->id())->get();
    }

    protected $rules = [
        'role' => ['required', 'string'],
        'organization' => ['required', 'string'],
        'responsilibities' => ['required', 'string'],
        'achievements' => ['required', 'string'],
        'startdate' => ['required'],
        'enddate' => ['sometimes'],
      //  'present' => ['sometimes', 'string'],
        'reason' => ['required', 'string']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addExperience()
    {
        $this->validate();

        if(!isset($this->enddate))
        {
           $this->present = 'Till date';
        }  

        WorkExperience::create([
            'user_id' => auth()->id(),
            'position' => $this->role,
            'company' => $this->organization,
            'duties' => $this->responsilibities,
            'achievements' => $this->achievements,
            'started' => $this->startdate,
            'ended' => $this->enddate,
            'present' => $this->present,
            'reason' => $this->reason
        ]);

       $this->clearFields();
       $this->closeModal();
    }

    public function clearFields()
    {
        $this->modelId = null;
        $this->role = $this->organization = $this->responsilibities = $this->achievements = $this->startdate = $this->enddate = $this->reason = $this->present = '';
    }

    public function openModal()
    {
        # code...
        $this->isModalOpen = true;
    }
  
    public function closeModal()
    {
        
        $this->clearFields();
        $this->isModalOpen = false;

    }


    public function editModal($id)
    {
       $this->modelId = $id['id'];
        $this->role = $id['position'];
        $this->organization = $id['company'];
        
        $this->responsilibities = $id['duties'];
        $this->achievements = $id['achievements'];
        $this->startdate = $id['started'];
        $this->enddate = $id['ended'];
        $this->reason = $id['reason'];
       
  
        $this->isModalOpen = true;
    }

    public function updateExperience()
    {
        $this->validate();

        if(!isset($this->enddate))
        {
           $this->present = 'Till date';
        }  

        WorkExperience::where('id', $this->modelId)
        ->update([
            'position' => $this->role,
            'company' => $this->organization,
            'duties' => $this->responsilibities,
            'achievements' => $this->achievements,
            'started' => $this->startdate,
            'ended' => $this->enddate,
            'present' => $this->present,
            'reason' => $this->reason
        ]);

       $this->closeModal();
    }
    public function openModalDelete($id)
    {
        # code...
        $this->modelId = $id['id'];
        $this->organization = $id['company'];
        $this->isModalDelete = true;
    }
    public function closeModalDelete()
    {
        
       // $this->clearFields();
        $this->isModalDelete = false;

    }
    public function deleteExperience()
    {
        # code...
        WorkExperience::destroy($this->modelId);

        $this->closeModalDelete();
    }
    public function render()
    {
        return view('livewire.experience', [
            'data' => $this->getExp()
        ]);
    }
}
