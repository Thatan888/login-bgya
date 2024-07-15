@extends('layouts.app-master')

@section('content')

<div class="card">
	<div class="card-header">Editar solicitud</div>
	<div class="card-body">
		<form method="post" action="{{ route('applications.update', $application->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripcion de la Solicitud</label>
				<div class="col-sm-10">
					<textarea type="text" name="application_description"class="form-control" rows="3">{{ $application->application_description }}
					</textarea>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Fecha de la Solicitud</label>
				<div class="col-sm-10">
					<input type="text" name="application_date" class="form-control" value="{{ $application->application_date }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Estudiante</label>
				<div class="row mb-4">
					<label class="col-sm-2 col-label-form">Estudiante:</label>
					<div class="col-sm-10">
						<input type="hidden" id="student_id" name="student_id" value="{{ $application->student->id }}">
						<input id="autocomplet_student" type="text" class="form-control" placeholder="Busca un estudiante..."
						value="{{ $application->student->student_name }}">
					</div>
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $application->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>

@endsection('content')
