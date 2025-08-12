@include('home.header')















<style>
    .alert-danger {
        color: #ffffff;
        background-color: #db4c4c;
        border-color: #f8b4b4;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        line-height: 1.5;
        font-family: "Open Sans", sans-serif;
    }
</style>
<!-- =============================Wrapper========================================================== -->
<section class="container-fluid bg-contact-us">
<div class="row">
    <div class="col-6 abt-us-txt">
        <h2> Contact Us</h2>
    </div>
    <div class="col-6">
        <img class="flying-man" src="images/contact-us.png">
    </div>
</div>
<!-- the body section that contain the text =============== -->
</section>
<div class="container abt-p-txt">
    <div class="row">

    <div class="col-md-8 col-sm-12">
        <form method = "POST">
            <div>
                <select class="form-control" id="select" name ="question">
                    <option value="Trading Question">Trading Question</option>
                    <option value="Finance Question">Finance Question</option>
                    <option value="Technical Question">Technical Question</option>
                </select>
            </div>
            <br />
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input type="text" class="form-control" id="name" placeholder="  Name" name ="name" required="">
                </div>
                <div class="form-group col-md-6 col-sm-12" style="">
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="  Email" name ="email" required="">
                </div>

                <div class="form-group col-md-6 col-sm-12" style="">
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Phone" name ="phone" required="">
                </div>

                <div class="form-group col-md-6 col-sm-12" style="display: none">
                    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Url" name ="url">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12" style="padding: 0">
                <textarea class="form-control"placeholder="Message" name ="message" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="submit" name = "btn_save">Submit</button>
        </form>
    </div>
    <!-- end col -->
    <div class="col-md-4">
        <div class="col col-contact-side">
            <i class="fas fa-home col-contact-side-i"></i>
            <b> ADDRESS: </b>
            <p>Level 20 Heron Tower, 52 gate town, London EC2N 4AY  </p>
        </div>
        <!-- ===== -->
        <div class="col col-contact-side">
            <i class="fas fa-envelope col-contact-side-i"></i>
            <b> EMAIL ADDRESS: </b>
            <p class="green"> info@Global Crypto Organization World Wide   </p>
        </div>
    </div>
</div>
</div>
<div style="padding: 20px;"></div>
            <!-- footer -->
           
    
    @include('home.footer')
    
