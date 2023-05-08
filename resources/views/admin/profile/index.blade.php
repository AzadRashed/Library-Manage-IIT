<x-backend.layout.master>

      @slot('title')
    admin-profile
    @endslot
     <main id="main">
    <!-- ======= Breadcrumbs ======= -->
  <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>
   <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
            <x-backend.alertmessage.alertmessage type="success"/>
       @foreach ($user_profile as $user)
           
    
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ asset('storage/profiles').'/'.$user->profile->image }}" alt="Profile" class="rounded-circle" style="width:100px ;height:100px">
              <h2>{{ $user->name }}</h2>
              <span class="badge bg-success">{{ucfirst($user->role)  }}</span>
              <div class="gap-x-3 mt-2 ">
                <a href="{{ $user->profile->twiter_url }}" class="twitter"><i class="bi bi-twitter text-info fs-5 me-2"></i></a>
                <a href="{{ $user->profile->facebook_url }}" class="facebook"><i class="bi bi-facebook text-primary fs-5 me-2"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram text-warning fs-5 me-2"></i></a>
                <a href="{{ $user->profile->linkedin_url }}" class="linkedin"><i class="bi bi-linkedin text-primary fs-5 "></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">{{ $user->profile->description ? $user->profile->description : 'Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.'  }}</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Institute</div>
                    <div class="col-lg-9 col-md-8">Institute of Information Technology</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Profession</div>
                    <div class="col-lg-9 col-md-8">{{ $user->profile->profession }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">Bangladesh</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ $user->profile->address}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ $user->profile->mobile }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                  </div>

                </div>
{{-- profile edit --}}
                <div class="tab-pane fade profile-edit pt-3 " id="profile-edit">

                  <!-- Profile Edit Form -->
                 <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
                   <div class="row mb-3">
  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
  <div class="col-md-8 col-lg-9">
    <img src="{{ asset('storage/profiles').'/'.$user->profile->image }}" alt="Profile" style="width:100px; height:100px" id="preview-image">
    <div class="pt-2">
      <div class="input-group mb-3">
        <label class="input-group-text bg-primary rounded-2" for="inputGroupFile01" id="upload-label">
          <i class="bi bi-upload px-4 text-white rounded-2"></i>
        </label>
        <input type="file" class="form-control" id="inputGroupFile01" style="display:none" onchange="previewImage()" name="image">
      </div>
    </div>
  </div>
</div>


                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{ $user->name }}" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="about" style="height: 100px">{{ $user->profile->description }}</textarea>
                      </div>
                    </div>
{{-- 
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Profession</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="profession" type="text" class="form-control" id="Job" value="{{ $user->profile->profession }}">
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{ $user->profile->address }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control" id="Phone" value="{{ $user->profile->mobile }}">
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twiter_url" type="text" class="form-control" id="Twitter" value="{{ $user->profile->twiter_url }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook_url" type="text" class="form-control" id="Facebook" value="{{ $user->profile->facebook_url }}">
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin_url" type="text" class="form-control" id="Linkedin" value="{{ $user->profile->linkedin_url }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3 show active" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{ route('user.change.password') }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="currentPassword">
                             @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                      </div>
                    </div>

                     <div class="row mb-3">
    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
    <div class="col-md-8 col-lg-9">
        <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newPassword">
        @error('newpassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
    <div class="col-md-8 col-lg-9">
        <input name="newpassword_confirmation" type="password" class="form-control @error('renewpassword') is-invalid @enderror" id="renewPassword">
        @error('renewpassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
   <!-- End #main -->    
      @endforeach   
 
 <script>
   function previewImage() {
  var preview = document.getElementById('preview-image');
  var fileInput = document.getElementById('inputGroupFile01');
  var file = fileInput.files[0];
  var reader = new FileReader();
  reader.onloadend = function () {
    preview.src = reader.result;
  }
  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "{{ asset('storage/profiles').'/'.$user->profile->image }}";
  }
}
 
    
    
</script>  



  
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
  <script>
    $(document).ready(function(){
        $(document).on('click','.add_category',function(e){
            e.preventDefualt();
            let title=$('#title').val();
            let description=$('#description').val();
            console.log(title+description);
        })
    })
  </script>
</x-backend.layout.master>