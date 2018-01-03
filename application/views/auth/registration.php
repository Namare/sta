<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="col-md-12 ">
    <div class="col-md-10 col-md-push-1 white_block ">
        <div class="col-md-12  col-xs-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registration</div>
        </div>

        <div class="col-md-8 col-md-push-2">

        <div class="col-md-6 form-group">
            <label>Enter Username: </label>
            <input class="form-control" name="username" placeholder="User name">
        </div>
        <div class="col-md-6 form-group">
                <label>Enter Email: </label>
                <input class="form-control" name="email" placeholder="Email">
        </div>
        <div class="col-md-6 form-group">
                <label>Enter First Name: </label>
                <input class="form-control" name="firstname" placeholder="First name">
        </div>
        <div class="col-md-6 form-group">
                <label>Enter Last Name: </label>
                <input class="form-control" name="lastname" placeholder="Last name">
        </div>
        <div class="col-md-4 form-group">
                <label>You are: </label>
               <select name="sp" class="form-control">
                   <option value='4'>Driver</option>
                   <option value='5'>Owner-operator</option>
                   <option value='3'>Company</option>
               </select>
        </div>
        <div class="col-md-4 form-group">
                <label>Equipment: </label>
               <select name="ai" class="form-control">
                   <option value='1'>Rifer</option>
                   <option value='2'>Flat Bed</option>
                   <option value='4'>Dryvan</option>
                   <option value='5'>Car-carrier</option>
                   <option value='6'>Sprinter/Box–Truck </option>
                   <option value='7'>Other </option>
               </select>
        </div>
        <div class="col-md-4 form-group o_a">
                <label>Other: </label>
                <input class="form-control" name="other_auto">

        </div>


        <div class="col-md-4 form-group">
              <label>How long CDL: </label>
              <input class="form-control"  name="hl" placeholder="Years">
        </div>



        <div class="col-md-12 form-group ex_c">
            <input name="company_name" class="form-control" placeholder="Company">
            <input name="ci" type="hidden" >
        </div>


        <div class="col-md-6 form-group">
             <label>Password: </label>
            <input class="form-control" name="password" type="password"  placeholder="password">
        </div>

        <div class="col-md-6 form-group">
             <label>Confirm Password: </label>
            <input class="form-control" name="cpassword"  type="password" placeholder="password">
        </div>

        <div class="col-md-12 form-group">
                <label> <span class="regErr"></span></label>
                <button class="reg_send btn btn-block btn-primary">Register</button>
        </div>


        </div>

    </div>
</div>



    <script>

    var company = [
        <?foreach($company as $com){?>
        {
            id: "<?=$com->id?>",
            label: "<?=$com->company_name?>"
        },
        <?}?>
    ];

</script>
</script>
<script type="text/javascript" src="<?=base_url()?>js/registration.js?<?=rand(1,1000)?>"></script>
