@extends('layouts.master')
@section('title')
Buat Account Baru!
@endsection
@section('content')
<form action="/register" method="post">
    @csrf

  <h3>Sign Up Form</h3>

  <label>First name:</label><br>
  <input type="text" name="fname"><br><br>

  <label>Last name:</label><br>
  <input type="text" name="lname"><br><br>

  <label>Gender:</label><br>
  <input type="radio" name="gender">Male<br>
  <input type="radio" name="gender">Female<br>
  <input type="radio" name="gender">Other<br><br>

  <label>Nationality:</label><br><br>
  <select name="nationality">
    <option value="0">Indonesian</option>
    <option value="1">Singaporean</option>
    <option value="2">Malaysian</option>
    <option value="3">Australian</option>
  </select><br><br>

  <label>Language Spoken:</label> <br>
  <input type="checkbox" name="languange">Bahasa Indonesia <br>
  <input type="checkbox" name="languange">English <br>
  <input type="checkbox" name="languange">Other <br><br>

  <label>Bio:</label> <br>
  <textarea name="bio" cols="30" rows="10"></textarea><br><br>

  <input type="submit" name="form" value="Sign Up">
</form>
@endsection
