@extends('layouts.dashboard_layout')
@section('content')
    <section class="flat-title2 ">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-group fs-30 lh-45 fw-7">
                        Mes publications
                        <a class="sc-button" href="/agent/posts/add"
                            style="float: right;padding:0px;padding-left:10px;padding-right:10px">
                            <span>Ajouter +</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-counter">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-count flex-wrap flex justify-content-center">
                        <div class="box tf-counter flex bg-white col-lg-5">
                            <div class="icons">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1523_44745)">
                                        <path
                                            d="M17.9453 36C17.3628 36 16.8906 35.5278 16.8906 34.9453C16.8906 34.3628 17.3628 33.8906 17.9453 33.8906C26.7074 33.8906 33.8359 26.7621 33.8359 18C33.8359 9.23787 26.7074 2.10938 17.9453 2.10938C17.3628 2.10938 16.8906 1.63716 16.8906 1.05469C16.8906 0.472219 17.3628 0 17.9453 0C22.7533 0 27.2735 1.87235 30.6733 5.27203C34.073 8.67178 35.9453 13.192 35.9453 18C35.9453 22.808 34.073 27.3281 30.6733 30.728C27.2735 34.1276 22.7533 36 17.9453 36Z"
                                            fill="#1C1C1E" />
                                        <path
                                            d="M26.4162 27.5273C26.2777 27.5275 26.1405 27.5003 26.0125 27.4473C25.8845 27.3943 25.7683 27.3165 25.6705 27.2184L17.1978 18.7457C17 18.548 16.8889 18.2797 16.8889 18V7.40918C16.8889 6.82672 17.3611 6.3545 17.9436 6.3545C18.526 6.3545 18.9982 6.82672 18.9982 7.40918V17.5632L27.162 25.7269C27.5738 26.1388 27.5738 26.8066 27.162 27.2185C27.0641 27.3165 26.9479 27.3943 26.8199 27.4473C26.6919 27.5003 26.5547 27.5275 26.4162 27.5273ZM11.8158 3.25245C11.946 3.25245 12.0785 3.22819 12.2068 3.17693C12.2106 3.17546 12.5861 3.0259 12.9903 2.89955C13.4221 2.76462 13.9327 2.6202 13.9378 2.61879C14.4984 2.46045 14.8244 1.87763 14.666 1.3171C14.5077 0.756567 13.9253 0.430458 13.3644 0.588872C13.3425 0.595059 12.8213 0.742434 12.3611 0.886223C12.0447 0.986087 11.7319 1.09692 11.4233 1.21852C10.8826 1.43494 10.6199 2.04849 10.8361 2.58919C11.001 3.00157 11.3971 3.25245 11.8158 3.25245ZM7.55679 3.2952C7.53837 3.3087 7.10194 3.62918 6.72133 3.92499C6.4599 4.12931 6.20569 4.3427 5.95915 4.56476C5.52855 4.95682 5.4974 5.62353 5.88926 6.05426C5.98804 6.16305 6.10852 6.24994 6.24293 6.30933C6.37734 6.36872 6.52271 6.39929 6.66965 6.39908C6.93207 6.39937 7.18511 6.30151 7.37904 6.12472C7.38206 6.12197 7.68124 5.85043 8.01565 5.59062C8.37298 5.31296 8.80062 4.99887 8.8049 4.99578C9.27452 4.65111 9.37577 3.99108 9.03117 3.52147C8.68643 3.05185 8.0264 2.95053 7.55679 3.2952ZM4.52498 7.55958C4.03765 7.24043 3.38402 7.3767 3.0648 7.86397C3.05229 7.88302 2.75571 8.33604 2.50272 8.74653C2.32946 9.02948 2.16609 9.31839 2.01293 9.61271C1.74694 10.1308 1.95119 10.7662 2.46912 11.0323C2.6179 11.109 2.78287 11.1491 2.95026 11.1491C3.3329 11.1491 3.70219 10.9401 3.88922 10.5765C3.89097 10.5729 4.07618 10.2137 4.2983 9.85332C4.53581 9.46807 4.82641 9.02412 4.8293 9.01969C5.14851 8.53243 5.01218 7.87873 4.52498 7.55958ZM1.00915 16.893C1.05036 16.8978 1.09182 16.9003 1.13332 16.9003C1.66087 16.9003 2.11657 16.5052 2.1795 15.9684C2.17999 15.9644 2.22703 15.567 2.30958 15.1478C2.39705 14.704 2.51376 14.1865 2.51496 14.1813C2.64335 13.6131 2.28687 13.0485 1.71867 12.9201C1.1504 12.7916 0.585936 13.1482 0.457475 13.7164C0.452412 13.7386 0.333162 14.2669 0.239998 14.7401C0.176825 15.0657 0.124973 15.3934 0.0845374 15.7227C0.0166155 16.3012 0.430545 16.8252 1.00915 16.893ZM2.46623 21.6175C2.40179 21.3482 2.34659 21.0767 2.30072 20.8036C2.22717 20.3571 2.15524 19.8314 2.15454 19.8262C2.07572 19.2491 1.54493 18.8448 0.966819 18.9239C0.389694 19.0027 -0.0142517 19.5344 0.0644983 20.1116C0.067592 20.1341 0.140998 20.6707 0.219326 21.1463C0.274184 21.4736 0.340412 21.7989 0.417889 22.1215C0.536225 22.6025 0.9671 22.9245 1.44122 22.9245C1.52468 22.9245 1.6094 22.9145 1.69406 22.8937C2.25972 22.7545 2.60545 22.1832 2.46623 21.6175ZM4.27326 26.1044C4.04805 25.7119 3.79655 25.2447 3.79401 25.24C3.51804 24.727 2.87826 24.535 2.36562 24.8108C1.85262 25.0867 1.66045 25.7263 1.93643 26.2392C1.94719 26.2593 2.2039 26.7362 2.44387 27.1543C2.60985 27.4415 2.78577 27.723 2.97129 27.998C3.1754 28.2971 3.5063 28.4581 3.84309 28.4581C4.04777 28.4581 4.2547 28.3986 4.43646 28.2746C4.91761 27.9464 5.04157 27.2903 4.71356 26.8091C4.71124 26.8057 4.48399 26.4716 4.27326 26.1044ZM8.6363 30.8845C8.41096 30.7233 8.19111 30.5546 7.97712 30.3786C7.62872 30.0899 7.22955 29.7404 7.22562 29.7368C6.78764 29.353 6.12115 29.3968 5.73731 29.835C5.3534 30.2731 5.39735 30.9394 5.8354 31.3233C5.85255 31.3384 6.25994 31.6951 6.63119 32.0028C7.02269 32.3272 7.40463 32.597 7.42073 32.6083C7.59812 32.7338 7.81006 32.8011 8.02732 32.801C8.35856 32.801 8.68467 32.6454 8.89012 32.3542C9.22573 31.8783 9.1121 31.2203 8.6363 30.8845ZM13.7377 33.3279C13.4702 33.2561 13.2053 33.175 12.9434 33.0851C12.5159 32.9366 12.0197 32.749 12.0147 32.7471C11.4701 32.5409 10.8613 32.8154 10.655 33.3602C10.4488 33.905 10.7233 34.5137 11.2681 34.7199C11.2895 34.728 11.796 34.9195 12.2515 35.0776C12.7317 35.2444 13.1839 35.3633 13.2029 35.3684C13.2925 35.3919 13.3825 35.4031 13.4709 35.4031C13.9388 35.4031 14.3663 35.0894 14.4904 34.6155C14.6382 34.052 14.3012 33.4756 13.7377 33.3279Z"
                                            fill="#1C1C1E" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1523_44745">
                                            <rect width="36" height="36" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="counter-box one ">
                                <div class="title-count fw-6 fs-16 text-color-4">Immobilier</div>
                                <div class="count-number">
                                    <div class="number number-one" data-speed="2000" data-to="{{ $countImmo }}"
                                        data-inviewport="yes">{{ $countImmo }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box tf-counter flex bg-white col-lg-5">
                            <div class="icons">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1523_44755)">
                                        <path
                                            d="M8.24026 35.2271C7.78238 35.2271 7.32901 35.0831 6.93863 34.7985C6.60484 34.5576 6.34612 34.2271 6.19241 33.8452C6.03871 33.4633 5.99631 33.0457 6.07013 32.6408L7.73626 22.9151L0.667882 16.0391C0.370511 15.7505 0.160689 15.3838 0.0625688 14.9811C-0.0355513 14.5785 -0.017981 14.1563 0.113257 13.7633C0.239719 13.3729 0.473671 13.0261 0.788271 12.7626C1.10287 12.4992 1.48537 12.3297 1.89188 12.2738L11.6513 10.8506L16.0253 1.99801C16.3965 1.24426 17.1548 0.772888 18.0008 0.772888C18.8468 0.772888 19.6039 1.24314 19.9774 1.99914L24.3503 10.8506L34.1153 12.2749C34.9421 12.3908 35.6228 12.9611 35.8883 13.7633C36.0194 14.1556 36.0372 14.5769 35.9397 14.9788C35.8422 15.3808 35.6333 15.7471 35.337 16.0358L31.98 19.2904C31.7641 19.4884 31.4795 19.5944 31.1867 19.5859C30.8939 19.5773 30.616 19.4549 30.412 19.2447C30.2081 19.0344 30.0942 18.7529 30.0945 18.4599C30.0949 18.167 30.2095 17.8858 30.414 17.676L33.7665 14.4248L23.4413 12.9926C23.2609 12.9665 23.0895 12.897 22.9419 12.79C22.7944 12.683 22.675 12.5417 22.5941 12.3784L17.9591 2.99589L13.4063 12.3784C13.3255 12.5416 13.2063 12.6828 13.0589 12.7898C12.9116 12.8967 12.7405 12.9664 12.5603 12.9926L2.21026 14.5001L9.72863 21.7159C9.8597 21.8429 9.9579 21.9999 10.0147 22.1734C10.0716 22.3469 10.0854 22.5315 10.0549 22.7115L8.28638 33.03L17.4754 28.1093C17.6474 28.0185 17.84 27.9739 18.0345 27.9798C18.2289 27.9858 18.4184 28.042 18.5846 28.143C19.1145 28.467 19.3125 29.1758 18.9896 29.7068C18.8209 29.9824 18.5599 30.1658 18.2741 30.2321L9.26513 34.9718C8.94917 35.1397 8.59693 35.2277 8.23913 35.2283L8.24026 35.2271Z"
                                            fill="#1C1C1E" stroke="white" stroke-width="0.5" />
                                        <path
                                            d="M28.125 36C23.7825 36 20.25 32.4675 20.25 28.125C20.25 23.7825 23.7825 20.25 28.125 20.25C32.4675 20.25 36 23.7825 36 28.125C36 32.4675 32.4675 36 28.125 36ZM28.125 22.5C25.0234 22.5 22.5 25.0234 22.5 28.125C22.5 31.2266 25.0234 33.75 28.125 33.75C31.2266 33.75 33.75 31.2266 33.75 28.125C33.75 25.0234 31.2266 22.5 28.125 22.5Z"
                                            fill="#1C1C1E" stroke="white" stroke-width="0.5" />
                                        <path
                                            d="M28.125 31.5C27.8266 31.5 27.5405 31.3815 27.3295 31.1705C27.1185 30.9595 27 30.6734 27 30.375V25.875C27 25.5766 27.1185 25.2905 27.3295 25.0795C27.5405 24.8685 27.8266 24.75 28.125 24.75C28.4234 24.75 28.7095 24.8685 28.9205 25.0795C29.1315 25.2905 29.25 25.5766 29.25 25.875V30.375C29.25 30.6734 29.1315 30.9595 28.9205 31.1705C28.7095 31.3815 28.4234 31.5 28.125 31.5Z"
                                            fill="#1C1C1E" stroke="white" stroke-width="0.5" />
                                        <path
                                            d="M30.375 29.25H25.875C25.5766 29.25 25.2905 29.1315 25.0795 28.9205C24.8685 28.7095 24.75 28.4234 24.75 28.125C24.75 27.8266 24.8685 27.5405 25.0795 27.3295C25.2905 27.1185 25.5766 27 25.875 27H30.375C30.6734 27 30.9595 27.1185 31.1705 27.3295C31.3815 27.5405 31.5 27.8266 31.5 28.125C31.5 28.4234 31.3815 28.7095 31.1705 28.9205C30.9595 29.1315 30.6734 29.25 30.375 29.25Z"
                                            fill="#1C1C1E" stroke="white" stroke-width="0.5" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1523_44755">
                                            <rect width="36" height="36" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="counter-box one ">
                                <div class="title-count fw-6 fs-16 text-color-4">Automobile</div>
                                <div class="count-number">
                                    <div class="number number-one" data-speed="2000" data-to="{{ $countCar }}"
                                        data-inviewport="yes">{{ $countCar }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">

                </div>

            </div>
        </div>
    </section>

    <section class="flat-dashboard">
        <div class="container7">
            <div class="row">
                <div class="col-lg-12 flex post-col">

                    <div class="tf-new-listing w-100">
                        <div class="new-listing bg-white">
                            <h3 class="titles">Mes publications</h3>


                            {{-- <div class="wrap-form wd-find-select date-wgs flex">
                                <div class="form-group-1 search-form form-style relative">
                                    <i class="far fa-search"></i>
                                    <input type="search" class="search-field" placeholder="Rechercher..." value=""
                                        name="s" title="Rechercher" required="">
                                </div>
                                <div class="form-group-2 form-style relative">
                                    <input type="date" class="date-wg" name="date" value="" required="">
                                    <p class="p-date">De</p>
                                </div>
                                <div class="form-group-3 form-style relative">
                                    <input type="date" class="date-wg" name="date" value="" required="">
                                    <p class="p-date">À</p>
                                </div>
                                <div class="form-group-4">
                                    <div class="group-select">
                                        <div class="nice-select" tabindex="0"><span class="current">Status</span>
                                            <ul class="list style">
                                                <li data-value class="option selected">Status</li>
                                                <li data-value="live" class="option">En cours</li>
                                                <li data-value="classed" class="option ">Classé</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="sub-text fs-12 lh-18 "><span class="one font-2 fw-7">{{ $posts->count() }}</span>
                                <span>resultat(s)</span>
                            </div>
                            <div class="table-content">
                                <div class="wrap-listing table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="fw-6">Publication</th>
                                                <th class="fw-6">Status</th>
                                                <th class="fw-6" >vue</th>
                                                <th class="fw-6">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr class="file-delete">
                                                <td>
                                                    <div class="candidates-wrap flex">
                                                        <div class="images">
                                                            @if ($post->photos->isNotEmpty())
                                                                <img src="{{ asset('storage/'.$post->photo) }}" class="rounded"
                                                                     style="width: 100px" alt="images">
                                                            @else
                                                                <img src="/images/default.jpg" class="rounded"
                                                                     style="width: 100px" alt="Image par défaut">
                                                            @endif
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="link-style-1">
                                                                <a href="property-detail-v1.html">{{ $post->label }}</a>
                                                            </h4>
                                                            <div class="text-date">
                                                                <p class="p-12 text-color-2 lh-18">Publié le: {{ formatDate($post->created_at) }}</p>
                                                            </div>
                                                            <div class="money fs-16 fw-6 text-color-3">
                                                                {{ $post->price }} Fcfa
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status-wrap">
                                                        @if ($post->status == 0)
                                                            <div class="button-status fs-12 fw-6 lh-18 style-1">Supprimé</div>
                                                        @elseif ($post->status == 1)
                                                            <div class="button-status fs-12 fw-6 lh-18">Actif</div>
                                                        @else
                                                            <div class="button-status fs-12 fw-6 lh-18 style-2">Classé</div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $post->views }}
                                                </td>
                                                <td>
                                                    <div class="actions d-flex gap-5">
                                                        {{-- Voir --}}
                                                        <a href="{{ route('details.post', $post->id) }}" class="btn btn-sm btn-primary me-3" style="margin: 8px" title="Voir">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- Éditer --}}
                                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning" style="margin: 8px" title="Éditer">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        {{-- Supprimer --}}
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Supprimer ce post ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" style="margin: 8px" title="Supprimer">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('posts.activate', $post->id) }}" method="POST" onsubmit="return confirm('Activer ce post ?')">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success" style="margin: 8px" title="Activer">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </form>


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
