@extends("app")
@section("content")
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-zinc-900">Users</h1>
                <p class="mt-2 text-sm text-zinc-700">A list of all the users in your account including their name, title, email and role.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" class="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-lime-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Add user</button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-zinc-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-zinc-900 sm:pl-0">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-zinc-900">DOB</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-zinc-900">Gender</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-zinc-900">Status</th>
                            <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200">
                        @foreach($patients as $patient)
                        <tr>
                            <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-zinc-900 sm:pl-0">{{ $patient->full_name }}</td>
                            <td class="px-3 py-4 text-sm whitespace-nowrap text-zinc-500">{{ $patient->dob }}</td>
                            <td class="px-3 py-4 text-sm whitespace-nowrap text-zinc-500">{{ $patient->gender }}</td>
                            <td class="px-3 py-4 text-sm whitespace-nowrap text-zinc-500">{{ $patient->status }}</td>
                            <td class="relative py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-0">
                                <a href="#" class="text-lime-600 hover:text-lime-900">Edit<span class="sr-only">, {{ $patient->full_name }}</span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
