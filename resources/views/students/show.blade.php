@extends('layouts.app-master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

    @if($error =='The student name field is required.')
    <li>Se requiere el nombre del estudiante.</li>
    @elseif($error =='The student email field is required.')
    <li>Se requiere el correo del estudiante.</li>
    @elseif($error =='The student image field is required.')
    <li>Se requiere la imagen del estudiante.</li>
    @elseif($error =='The student email field must be a valid email address.')
    <li>El correo del estudiante debe ser valido.</li>
    @elseif($error =='The student image field must be an image.')
    <li>Debe seleccionar una imagen valida.</li>
    @elseif($error =='The student image field must be a file of type: jpg, png, jpeg, gif, svg.')
    <li>El formato de la imagen debe ser de tipo: jpg, png, jpeg, gif, svg.</li>
    @elseif($error =='The student image field has invalid image dimensions.')
    <li>Las dimensiones de la imagen no son validas. Debe seleccionar una imagen con dimenciones minimas 100x100 y maximas 1000x1000.</li>
    @else
    <li>{{ $error }}</li>
    @endif

	@endforeach
	</ul>
</div>

@endif


<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Student Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Name</b></label>
			<div class="col-sm-10">
				{{ $student->student_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Student Email</b></label>
			<div class="col-sm-10">
				{{ $student->student_email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Student Gender</b></label>
			<div class="col-sm-10">
				{{ $student->student_gender }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Student Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $student->student_image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')
