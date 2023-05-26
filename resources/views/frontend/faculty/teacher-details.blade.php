
 <x-frontend.layout.master>

	<x-slot name="title">Teacher-details</x-slot>
    <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Teacher Details</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
       <div class="container">

        <div class="row">

            <div class="col-4">
                <div class="card mt-5 text-center">
                    <img src="{{ asset('storage/profiles').'/'.$teacherDetails->profile->image }}" class="card-img-top mx-auto" alt="..." style="width:200px;height:200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacherDetails->name }}</h5>
                        <p class="card-text">Assistant professor</p>
                        <p class="card-text">Description paragraph goes here.</p>
                    </div>
                </div>
            </div>

            <div class="col-8">

                <ul class="nav nav-tabs mt-5 " id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="education-tab" data-bs-toggle="tab"
                            data-bs-target="#education" type="button" role="tab" aria-controls="education"
                            aria-selected="true">Education</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="research-tab" data-bs-toggle="tab" data-bs-target="#research"
                            type="button" role="tab" aria-controls="research" aria-selected="false">Research</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="teachings-tab" data-bs-toggle="tab" data-bs-target="#teachings"
                            type="button" role="tab" aria-controls="teachings" aria-selected="false">Teachings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="publication-tab" data-bs-toggle="tab" data-bs-target="#publication"
                            type="button" role="tab" aria-controls="publication" aria-selected="false">Publication</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="award-tab" data-bs-toggle="tab" data-bs-target="#award"
                            type="button" role="tab" aria-controls="award" aria-selected="false">Award</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="membership-tab" data-bs-toggle="tab" data-bs-target="#membership"
                            type="button" role="tab" aria-controls="membership" aria-selected="false">Membership</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="education" role="tabpanel"
                        aria-labelledby="education-tab">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Degree Name</th>
                                    <th>Group/Major Subject</th>
                                    <th>Board/Institute</th>
                                    <th>Country</th>
                                    <th>Passing Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bachelor's degree</td>
                                    <td>Computer Science</td>
                                    <td>ABC Board</td>
                                    <td>USA</td>

                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>Master's degree</td>
                                    <td>Business Administration</td>
                                    <td>XYZ Board</td>
                                    <td>Canada</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="research" role="tabpanel" aria-labelledby="research-tab">
                        <h2 >Research Interest </h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Research Interest (Goal, Target Indicator)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Research project 1</td>
                                    <td>ABC Research Institute</td>
                                    <td>AI</td>
                                </tr>
                                <tr>
                                    <td>Research project 2</td>
                                    <td>XYZ Research Center</td>
                                    <td>2022-03-15</td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>Project/Research Supervision</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Level of Study</th>
                                    <th>Title</th>
                                    <th>Supervisor</th>
                                    <th>Co-Supervisor(s)</th>
                                    <th>Name of Student(s)	</th>
                                    <th>Area of Research</th>
                                    <th>Current Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teacherDetails->researchSupervisions as $rs)
                                <tr>
                                    <td>{{ $rs->level_of_study }}</td>
                                    <td>{{ $rs->title }}</td>
                                    <td>{{ $rs->supervisors }}</td>
                                    <td></td>
                                    <td>{{ $rs->students }}</td>
                                    <td>{{ $rs->area_of_research }}</td>
                                    <td>{{ $rs->completion }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No research supervisions.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h2>Project/Research Work</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Project Name</th>
                                    <th>Source of Fund</th>
                                    <th>From Date</th>
                                    <th>To Date	</th>
                                    <th>Collaboration</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bachelors</td>
                                    <td>Design & Development of institute of information technology</td>
                                    <td>Md Audir Rahman</td>
                                    <td>Md Azad Hossain</td>

                                    <td>2-2-22</td>
                                    <td>1-1-23</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="teachings" role="tabpanel" aria-labelledby="teachings-tab">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course NAme</th>
                                    <th>Course Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- $teacherDetails->Teaching as $rs --}}
                                @forelse ($teacherDetails->Teaching as $tg)
                                    <tr>
                                        <td>{{ $tg->course_name }}</td>
                                        <td>{{ $tg->course_code }}</td>
                                       
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No Teachings information found
                                        </td>
                                    </tr>
                                @endforelse
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="publication" role="tabpanel" aria-labelledby="publication-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Journal Name</th>
                                    <th>Journal Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>course project 1</td>
                                    <td>ABC Research Institute</td>
                                    <td>2021-01-01</td>
                                    <td> <a href="https://www.example.com">Example.com</a>
                                    </body></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="award" role="tabpanel" aria-labelledby="award-tab">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Award Type</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Country</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Research project 1</td>
                                    <td>ABC Research Institute</td>
                                    <td>2021-01-01</td>
                                    <td>2021-01-01</td>
                                    <td>2021-01-01</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <p> <b>Azad</b> </p>
                       <p>Professor</p>
                       <p>IIT</p>
                       <p>Email:azad@gmail.com</p>
                       <p>Mobile:018</p>
                       <p><a href="https://www.example.com">Click here to visit Example.com</a></p>

                    </div>
                    <div class="tab-pane fade " id="membership" role="tabpanel" aria-labelledby="membership-tab">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Collaboration & Membership Name</th>
                                    <th>Type</th>
                                    <th>Membership Year	</th>
                                    <th>Expire Year </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Research project 1</td>
                                    <td>ABC Research Institute</td>
                                    <td>ABC Research Institute</td>

                                    <td>2021-01-01</td>
                                    <td>2021-01-01</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





        </div>
    </div>
    </section><!-- End Trainers Section -->

  </main>




 <script>
    // get the search input field and all the card elements
const searchInput = document.getElementById('search');
const cards = document.querySelectorAll('.card');

// add event listener to search input field
searchInput.addEventListener('input', filterCards);

function filterCards() {
  // get the search input value and convert it to lowercase
  const searchValue = searchInput.value.toLowerCase();

  // loop through all the card elements and check if their text content matches the search input value
  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    const cardTitle = card.querySelector('h6').textContent.toLowerCase();
    const cardSubtitle = card.querySelector('small').textContent.toLowerCase();
    const cardDate = card.querySelector('p').textContent.toLowerCase();
    const isMatch = cardTitle.includes(searchValue) || cardSubtitle.includes(searchValue) || cardDate.includes(searchValue);

    // show or hide the card elements based on the search results
    if (isMatch) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  }
}

  </script>
</x-frontend.layout.master>
