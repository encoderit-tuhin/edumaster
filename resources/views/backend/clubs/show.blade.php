@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
	<div class="panel-heading panel-title">{{ _lang('View Post') }}</div>

	<div class="panel-body">
	    <!--<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#english">{{ _lang('English') }}</a></li>
		
		</ul>-->
		
		<div class="tab-content params-panel">
	
			<div id="english" class="tab-pane fade in active">
			  <table class="table table-bordered">
				<tr><td>{{ _lang('Logo') }}</td><td><img src="{{asset('uploads/images/clubs/' . $club->logo) }}" style="max-width:200px;"></td></tr>
				<tr><td>{{ _lang('Banner Image') }}</td><td><img src="{{asset('uploads/images/clubs/' . $club->banner_image) }}" style="max-width:200px;"></td></tr>
				<tr><td>{{ _lang('Name') }}</td><td>{{ $club->name }}</td></tr>
				<tr><td>{{ _lang('Slogan') }}</td><td>{{  $club->slogan }}</td></tr>
				<tr><td>{{ _lang('Activity') }}</td><td>{{ $club->activity}}</td></tr>
                <tr><td>{{ _lang('History') }}</td><td>{!! $club->history !!}</td></tr>	
				<tr><td>{{ _lang('Mission Vision') }}</td><td>{{ $club->mission_vision }}</td></tr>	
				<tr><td>{{ _lang('Achievement') }}</td><td>{{ $club->achievement }}</td></tr>	
				<tr><td>{{ _lang(' Status') }}</td><td>{{ $club->status }}</td></tr>
			
				<tr><td>{{ _lang('Fb Link') }}</td><td>{{ $club->fb_link }}</td></tr>	
			  </table>
			</div>  

		</div>  
		  
	</div>
  </div>
 </div>
</div>
@endsection


