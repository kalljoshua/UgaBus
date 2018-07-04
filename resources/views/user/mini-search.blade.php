	<!-- START: MODIFY SEARCH -->
	<style type="text/css">
		.btn.focus, .btn:focus, .btn:hover {
			color: black;
			text-decoration: none;
		}
	</style>

	<div class="row modify-search modify-car">
		<div class="container clear-padding">
			<form method="get" action="{{route('search')}}" >
				{{csrf_field()}}
				<div class="col-md-3">
					<div class="form-gp">
						<label>Pick Up Location</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" name="departure" class="form-control" required placeholder="E.g. Kampala">
							<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-gp">
						<label>Drop-off Location</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" name="destination" class="form-control" placeholder="E.g. Kisumu">
							<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label>Travel Date</label>
						<div class="input-group margin-bottom-sm">
							<input type="text" id="check_out" name="date" class="form-control" required placeholder="MM/DD/YYYY">
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
						</div>
					</div>
				</div>
				<div class="col-md-1 col-sm-6 col-xs-6">
					<div class="form-gp">
						<label for="mini-seat-select">Seats</label>
						<select id="mini-seat-select" class="selectpickermini" name="seats">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="form-gp">
						<button type="submit" class="modify-search-button btn transition-effect">SEARCH</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<!-- END: MODIFY SEARCH -->