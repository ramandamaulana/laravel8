<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CreateModel;

class Create extends Component
{

    public $create;
    public $simpanId ,$name ,$email ,$password ;
    public $isOpen = 0;
    
    // Tampil Data Dari database
    public function render()
    {
        $this->create = CreateModel::all();
        return view('livewire.create');
    }
    // Memanggil Modal
    public function showmodal()
      {
          $this->isOpen = true;
      }
      
    public function hidemodal()
    {
        $this->isOpen = false;
    }

    //Simpan Data

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
        ]);

        CreateModel::updateOrCreate(['id'=> $this->simpanId],
        [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]
    );

        $this->hidemodal();
        session()->flash('info', $this->simpanId ? 'Post Update Successfully ' : 'Post Create Successfully');
        $this->simpan =''; 
        $this->email ='';
        $this->password='';

    
    }

    //update data
    public function edit($id){
        $item = CreateModel::findOrfail($id);
        $this->simpanId = $id;
        $this->name = $item->name;
        $this->email = $item->email;
        $this->password = $item->password;
        
        $this->showmodal();
    }
    //Delete Data

    public function delete($id){
        CreateModel::find($id)->delete();
  
 
    }
}
