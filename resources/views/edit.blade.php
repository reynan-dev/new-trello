@extends('layouts.app')

@section('content')
      <div class="row">
    <div class="col-md-12">
      <form action="{{route('update') }}" method="post" class="formu">
        @csrf
        @method('put')
        <h1> Edit profil</h1>
        
        <fieldset>
          
          <legend> Your Basic Info</legend>
        
          <label for="name">Name:</label>
          <input type="text" id="name" name="user_name" value="{{$user->name}}">
        
          <label for="name">Email:</label>
          <input type="email" id="name" value="{{$user->email}}" disabled>

          <label for="email">New email:</label>
          <input type="email" id="mail" name="email_a" >
          <label for="email">Verify new email:</label>
          <input type="email" id="mail" name="email_b">
        
          <label for="password">Password:</label>
          <input type="password" id="password" name="user_password">
        
        </fieldset>
        
          
        
        <button type="submit">Edit profil</button>
        <hr>
        <button type="submit" style="background-color:red;border:none">DELETE PROFIL</button>

        
        </form>
        </div>
      </div>
  
@endsection
<style>
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

.formu {
  border: solid 1px #0079BF;
  border-radius: 0.25rem;
  box-shadow: 5px 5px 5px grey;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #0079bf;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #0079bf;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}


</style>