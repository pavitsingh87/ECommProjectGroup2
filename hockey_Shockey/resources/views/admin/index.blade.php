@extends('layouts.main')

@section('content')

<style> 

body {
     background-size: cover; 
     background-repeat: no-repeat; 
     background-attachment: fixed;
    background-position:center; 
} 
h1 {
        font-size: 28px;  
        margin: 20px 0; 
    } 
.table-container { 
    /* width: 100%;
    display: flex; 
    justify-content: center;  */
    overflow-x: auto;
} 
table {
     width: 960px; 
     /* max-width: 100%;
     border-collapse: collapse; 
     background-color: rgba(0, 0, 0, 0.7); 
     color: #fff;  */ */
     /* width: 100%; */
     max-width: 100%;
     table-layout: fixed;
} 
table img {
     width: 200px;
    height: 150px;
    object-fit: cover; 
}
th, td {
     border: 1px solid #ccc; 
     padding: 10px; 
     text-align: center; 
    } 
     th {
    background-color: #333; 
} 
.wonder-button { 
    background: transparent; 
    border: 2px solid #073B76; 
    padding: 10px 20px;
    font-size: 18px; 
    border-radius: 25px; 
    text-align: center; 
    text-decoration: none; 
    display: inline-block; 
    transition: all 0.3s; 
    margin-top:20px; 
} 
.wonder-button:hover { 
    background: #0F0; 
    color: #fff; 
} 
.col-md-9{
     width:100%; 
    } 
.info-button{
color:black; 
font-family: 'Helvetica' , sans-serif; 
} 
</style>

<div class="col-md-9">


    <h1>{{ $title }}</h1> 
    <div class="table-container"> 
        <table class="table table-striped">
            <thead>
                <tr> 
                    <th>Title</th>
                    <th>Name</th> 
                    <th>Action</th> 
                </tr>
            </thead> 

            @foreach($wonders as $wonder) 

            <tr> 
                <td>
                    <a href="wonders/{{ $wonder->id }}"> <img src="/images/{{ $wonder->image }}" alt="{{ $wonder->title }}">
                </td>
                <td>
                    <p>{{ $wonder->Name }}</p>
                </td>
                <td>
                    <a href="admin/edit/{{ $wonder->id }}" class="btn btn-primary" role="button">
                        Edit
                    </a>
                    <form method="post" class="form form-inline d-inline" 
                        action="{{ route('admin.delete', ['id' => $wonder->id]) }}">
                        @method('DELETE')
                        @csrf    
                            <button onclick="return confirm('Really delete this wonder?')" 
                            class="d-inline btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
                @endforeach
        </table>
    </div>
</div>



@endsection()