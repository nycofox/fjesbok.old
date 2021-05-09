<x-admin-layout>
    <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
        <h1 class="page-title text-primary-d2 text-140">
            Users
            <small class="page-info text-dark-m3">
                <i class="fa fa-angle-double-right text-80"></i>
                all users
            </small>
        </h1>
    </div>

    <div class="card bcard h-auto">
        <table id="users"
               class="d-style w-100 table text-dark-m1 text-95 border-y-1 brc-black-tp11 collapsed dtr-table">
            <!-- add `collapsed` by default ... it will be removed by default -->
            <!-- thead with .sticky-nav -->
            <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
            <tr>
                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                    Name
                </th>

                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                    Email
                </th>

                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                    Last Active
                </th>

                <th class="border-0 bgc-white bgc-h-yellow-l3 shadow-sm">
                    Registered date
                </th>
            </tr>
            </thead>
            <tbody class="pos-rel">
            @foreach($users as $user)
                <tr class="d-style bgc-h-default-l4">
                    <td>
                        <span class="text-105">
                            {{ $user->name }}
                        </span>
                    </td>

                    <td class="text-105">
                        {{ $user->email }}
                    </td>

                    <td class="text-105">
                        @if($user->lastActivity())
                            {{ $user->lastActivity()->diffForHumans() }}
                        @else
                            Never
                        @endif
                    </td>

                    <td class="text-105">
                        {{ $user->created_at->format('Y-m-d') }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>

@push('page-scripts')
    <script>
        $(document).ready(function() {
            $('users').DataTable({

            });
        });

    </script>
@endpush
