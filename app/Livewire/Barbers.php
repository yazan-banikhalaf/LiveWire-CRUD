<?php

namespace App\Livewire;

use App\Models\Barber;
use Livewire\Component;

class Barbers extends Component
{
    public $search;
    public $BarberId;
    public $showform = false;
    public $name;
    public $email;
    public $password;

    public function resetFields()
    {
        $this->BarberId = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function toggleForm()
    {
        $this->showform = true;
        $this->resetFields();

    }
    public function cancelBox()
    {
        $this->showform = false;
        $this->resetFields();
    }
    public function create()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:barbers,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
        ]);
        Barber::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        session()->flash('message', 'Barber created successfully!');
        $this->cancelBox();
        return redirect('barbers');
    }
    public function edit($barberId)
    {
        //
        $barber = Barber::findOrFail($barberId);
        $this->BarberId = $barber->id;
        $this->name = $barber->name;
        $this->email = $barber->email;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been taken.',
        ]);
        $barber = Barber::findOrFail($this->BarberId);
        $barber->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        session()->flash('message', 'Barber updated successfully!');
        return redirect('/barbers');
    }
    public function destroy($id)
    {
        Barber::findorfail($id)->delete();
        session()->flash('message', 'User deleted successfully!');
        return redirect('/barbers');
    }

    public function render()
    {
        $barbers = Barber::where('name','like','%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.barbers', ['barbers' => $barbers]);
        //dd($barbers);
    }
}