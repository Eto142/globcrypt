@include('manager.header')
@include('manager.navbar')

<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">
	@if (session('error'))
	<div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
		<b>Error!</b>{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@elseif (session('status'))
	<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
		<b>Success!</b> {{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<!-- Main header starts -->

</div>
<!-- Row end -->

<!-- Row start -->
<div class="main-panel">
	<div class="content-wrapper">

<div class="col-md-6 grid-margin stretch-card">
		  <div class="card">
			<div class="card-body">
			  <p class="card-description">
				<form method="post" action="{{route('update-bank')}}">
					@csrf

   <div class="form-group">
   <input type="text" name="bank_name" class="form-control form-control-user" placeholder="Enter Bank Name" value="{{Auth::user()->bankName}}">
   </div>
   <br>
    <div class="form-group">
   <input type="text" name="account_name" class="form-control form-control-user" placeholder="Enter Account Name" value="{{Auth::user()->accountName}}">
   </div>
    <br>
    <div class="form-group">
   <input type="text" name="account_number" class="form-control form-control-user" placeholder="Enter Account Number" value="{{Auth::user()->accountNumber}}">
   </div>
    <br>
    <div class="form-group">
   <input type="text" name="bank_address" class="form-control form-control-user" placeholder="Enter Bank Address" value="{{Auth::user()->bankAddress}}">
   </div>
    <br>
    <div class="form-group">
   <input type="text" name="swift_code" class="form-control form-control-user" placeholder="Enter swiftCode" value="{{Auth::user()->swiftCode}}">
   </div>
  <br>
  <button type="submit" name="save" class="btn btn-primary btn-user btn-block"> update </button>
   <hr>
</form>

			</div>
		  </div>
		</div>       

</div>
</div>
</div>
<!-- Content wrapper end -->

</div>
<!-- Content wrapper scroll end -->

@include('manager.footer')