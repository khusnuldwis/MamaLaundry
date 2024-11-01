@extends('layouts')

@section('content')
      
   
<form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="input-group">
                    <input type="text" name="email" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
                
        
    
@endsection
