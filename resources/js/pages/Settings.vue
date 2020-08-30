<template>
  <div class="contentbar mt-100">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title mb-0">Settings</h5>
        </div>
        <div class="card-body row">
            <form class="col-md-6" @submit.prevent="updateUser">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Full Name</label>
                        <input type="text" class="form-control" id="username" v-model="user.name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fathername">Father's Name</label>
                        <input type="text" class="form-control" id="fathername" v-model="user.fathers_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="useremail">Email</label>
                        <input type="email" class="form-control" id="useremail" v-model="user.email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="usermobile">Mobile Number</label>
                        <input type="number" class="form-control" id="usermobile" v-model="user.primary_phone" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="secondary">Secondary Number</label>
                        <input type="number" class="form-control" id="secondary" v-model="user.secondary_phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" v-model="user.address" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" v-model="user.city" required>
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="userbirthdate">Date of Birth</label>
                      <input type="date" class="form-control" id="userbirthdate" v-model="user.date_of_birth" required>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="joindate">Date of Joining</label>
                      <input type="date" class="form-control" id="joindate" v-model="user.date_of_join" required>
                  </div>
                </div>
                <!--<div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" id="userpassword">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="userconfirmedpassword">Confirmed Password</label>
                        <input type="password" class="form-control" id="userconfirmedpassword">
                    </div>
                </div>-->
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="usermale" name="usergender" class="custom-control-input">
                        <label class="custom-control-label" for="usermale">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="userfemale" name="usergender" class="custom-control-input">
                        <label class="custom-control-label" for="userfemale">Female</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary-rgba font-16"><i class="feather icon-save mr-2"></i>Update</button>
            </form>

            <div class="col-md-6 profilebox pt-4 text-center">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-success-rgba font-18"><i class="feather icon-edit"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <img src="assets\images\users\profile.svg" class="img-fluid" alt="profile">
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-danger-rgba font-18"><i class="feather icon-trash"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
export default{
data(){
  return{
    users:[],
    user:{
      id:'temp',
      name:'temp',
      email:'temp',
      gender:'temp',
      primary_phone:'temp',
      secondary_phone:'temp',
      address:'temp',
      city:'temp',
      fathers_name:'temp',
      date_of_birth:'temp',
      date_of_join:'temp',
      profile_image:'temp'
    },
    user_id:'temp',
  }
},
created(){
  this.fetchSettings();
},
methods:{
  fetchSettings(){
    fetch('/api/settings')
    .then(res => res.json())
    .then(res =>{
      this.users  = res.data;
    })
    .catch(err=>console.log(err));
  }
}
}
</script>
