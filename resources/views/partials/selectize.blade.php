<?php 
	 use App\Http\Controllers\CreateRecipeController;  
	 use App\Http\Controllers\FindIngredientController;  
?>
@section('scripts') {!! Html::script('js/user/toggle.js') !!} @endsection

<div class="panel panel-default"><!-- Panel -->
	 <div class="panel-heading"><h2 class="white">Add Ingredients</h2></div>
		<div class="panel-body">
			<table id="selectizeTable">
				<tr>
					<td class="selectizeCell"><select id="searchbox" name="q" placeholder="Search ingredients..." class="form-control"></select></td>
					<td class="selectizeCell2">&nbsp;&nbsp;<a data-toggle="modal" href="#myModal2"><i class="glyphicon glyphicon-th-list pull-right"></i></a></td>
				</tr>
			</table>			 
		</div> 
		<div class="panel-body"><!-- Panel Body-->
			 {{ CreateRecipeController::ingredientSession() }}
			 <div class="phrase"><ul class="list" id="ingpanel"></ul></div>
		</div>
</div>

@section('bodyend')
	 @include('partials.modal')  	
@endsection