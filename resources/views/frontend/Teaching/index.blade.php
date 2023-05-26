<x-frontend.layout.master>
    <x-slot name="title">Teachings</x-slot>

    <main id="main my-5 py-5">

        <div class="card my-5 mb-4">
            <div class="mx-auto card w-75 rounded mb-5 mt-5">
                <x-frontend.form.card_header text="Teachings" class="rounded bg-white py-2" />
                <h6 class="text-end pe-5"><a class="btn btn-primary" href="{{ route('teachings.create') }}">Add
                        new</a></h6>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Course name</th>
                                    <th>Course Code</th>
                                    <th width="200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachings as $tg)
                                    <tr>
                                        <td>{{ $tg->course_name }}</td>
                                        <td>{{ $tg->course_code }}</td>
                                        <td>
                                            <a href="{{ route('teachings.edit', $tg->id) }}"
                                                class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('teachings.destroy', $tg->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
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
                </div>
            </div>
        </div>
    </main>
</x-frontend.layout.master>
