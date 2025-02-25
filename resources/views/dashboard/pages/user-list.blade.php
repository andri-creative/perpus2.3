@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Users</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Users</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <form class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" />
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
            <a href="{{ route('user-profile') }}"
                class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                User Baru
            </a>
        </div>
        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="d-flex align-items-center gap-10">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input radius-4 border input-form-dark" type="checkbox"
                                            name="checkbox" id="selectAll" />
                                    </div>
                                    S.L
                                </div>
                            </th>
                            <th scope="col">Bergabung</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_list as $i => $user_li)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-400"
                                                type="checkbox" name="checkbox" id="SL" />
                                        </div>
                                        {{ '0' . $i + 1 }}
                                    </div>
                                </td>
                                <td>{{ $user_li->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($user_li->photo ? 'images/upload/' . $user_li->photo : 'assets/images/user-list/user-list1.png') }}"
                                            alt="User Foto"
                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" />
                                        <div class="flex-grow-1">
                                            <span
                                                class="text-md mb-0 fw-normal text-secondary-light">{{ $user_li->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $user_li->email }}</span>
                                </td>
                                <td>{{ $user_li->position }}</td>

                                <td class="text-center">
                                    <span
                                        class="{{ $user_li->status == 'aktif'
                                            ? 'bg-success-focus text-success-600 border border-success-main'
                                            : ($user_li->status == 'inactive'
                                                ? 'bg-neutral-200 text-neutral-600 border border-neutral-400'
                                                : 'bg-success-focus text-success-600 border border-success-main') }}
                                           px-24 py-4 radius-4 fw-medium text-sm">
                                        {{ $user_li->status }}
                                    </span>

                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <button type="button"
                                            class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                        </button>
                                        <button type="button"
                                            class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                        </button>
                                        <button type="button"
                                            class="bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                <span>Showing 1 to 10 of 12 entries</span>
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="javascript:void(0)"><iconify-icon icon="ep:d-arrow-left"
                                class=""></iconify-icon></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600 text-white"
                            href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px"
                            href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="javascript:void(0)">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-neutral-300 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="javascript:void(0)">
                            <iconify-icon icon="ep:d-arrow-right" class=""></iconify-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
