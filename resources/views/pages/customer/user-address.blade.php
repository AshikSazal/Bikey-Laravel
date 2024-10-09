@extends('app')

@section('content')
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            @if (!$address)
                <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-2/4">
                    <form id="address-form" method="POST" action="{{route('user.address')}}">
                        @csrf
                        <x-input type="text" name="post" placeholder="Enter Your Post" />
                        <x-input type="text" name="road" placeholder="Enter Your Street Address" />
                        <x-input type="text" name="village" placeholder="Enter Your Village" />
                        <x-input type="text" name="district" placeholder="Enter Your District" />
                        <div class="grid justify-center items-center mt-6 mb-4">
                            <x-button type="submit" class="orange_color" id="address-btn" :disabled="true">SUBMIT</x-button>
                        </div>
                    </form>
                </x-card>
            @else
                <x-card class="bg-sky_blue_color shadow-md rounded-lg p-6 mt-4 w-screen ss:w-1/2 md:w-1/3 lg:w-1/4" id="address-info">
                    <h2 class="text-xl font-semibold text-center text-white">ADDRESS INFORMATION</h2>
                    <div class="bg-white -m-6 mt-4 p-6 rounded-b-lg">
                        <hr class="h-0.5 bg-orange_color border-0">
                        <table class="w-full mt-4">
                            <tbody>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>POST</strong></td>
                                    <td class="uppercase" id="post-info">{{ $address->post }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>ROAD</strong></td>
                                    <td class="uppercase" id="road-info">{{ $address->road }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>VILLAGE</strong></td>
                                    <td class="uppercase" id="village-info">{{ $address->village }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>DISTRICT</strong></td>
                                    <td class="uppercase" id="district-info">{{ $address->district }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="grid justify-center items-center mt-6">
                            <x-button type="button" class="orange_color" id="go-to-payment" :disabled="false" link='true' href="{{route('user.payment')}}">GO TO PAYMENT</x-button>
                        </div>
                        <div class="flex justify-center mt-3">
                            <a class="text-sky_blue_color text-md underline cursor-pointer" id="edit-address-btn">Edit</a>
                        </div>
                    </div>
                </x-card>
                <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-2/4 hidden" id="edit-address-card">
                    <form id="address-form" method="POST" action="{{route('user.address')}}">
                        @csrf
                        <x-input type="text" name="post" placeholder="Enter Your Post No" />
                        <x-input type="text" name="road" placeholder="Enter Your Street Address" />
                        <x-input type="text" name="village" placeholder="Enter Your Village" />
                        <x-input type="text" name="district" placeholder="Enter Your District" />
                        <div class="grid justify-center items-center mt-6 mb-4">
                            <x-button type="submit" class="orange_color" id="address-btn" :disabled="true">SUBMIT</x-button>
                        </div>
                    </form>
                </x-card>
            @endif
        </div>
        <x-error />
        <x-loading />
    </div>
@endsection

@section('scripts')

<script type="module">
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_PHONE_NUMBER, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

    document.addEventListener("DOMContentLoaded", function() {
        var userPost, userRoad, userVillage, userDistrict;
        const showError = document.getElementById('open-pop-up');
        const loading = document.getElementById("loading-container");

        function isFormValid() {
            const post = $('input[name="post"]').val();
            const road = $('input[name="road"]').val();
            const village = $('input[name="village"]').val();
            const district = $('input[name="district"]').val();

            var postIsValid = validate(post, [VALIDATOR_REQUIRE()]);
            var villageIsValid = validate(village, [VALIDATOR_REQUIRE()]);
            var districtIsValid = validate(district, [VALIDATOR_REQUIRE()]);

            if (postIsValid && villageIsValid && districtIsValid) {
                userPost = post;
                userRoad = road;
                userVillage = village;
                userDistrict = district;
                return true;
            } else {
                return false;
            }
        }

        function formValidate(){
            if (isFormValid()) {
                $('#address-btn').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#address-btn').css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }

        function emptyInputField(){
            $('input[name="post"]').val("");
            $('input[name="road"]').val("");
            $('input[name="village"]').val("");
            $('input[name="district"]').val("");
        }

        $('#address-form').on('keyup change','input',function(){
            formValidate();
        });

        $('#address-form').on('submit',function(event){
            event.preventDefault();
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type:"POST",
                url: "{{route('user.address')}}",
                data: {
                    post: userPost,
                    road: userRoad,
                    village: userVillage,
                    district: userDistrict
                },
                beforeSend: function(){
                    loading.style.display="flex";
                    document.body.style.overflow = 'hidden';
                },
                success: function(){
                    // loading.style.display="none";
                    // document.body.style.overflow = '';
                    window.location.href = "{{ route('user.payment') }}";
                },
                error: function(xhr, status, error){
                    loading.style.display="none";
                    // document.body.style.overflow = '';
                    
                    showError.style.display = "flex";
                    showError.classList.add("z-20","bg-black", "bg-opacity-80");
                    document.body.style.overflow = 'hidden';
                    $('#show-error-message').text(xhr.responseJSON.message);
                    $("#show-error-message").show();
                }
            });
        });

        $("#edit-address-btn").on('click', function(event) {
            const addressInfo = document.getElementById('address-info');
            const editCard = document.getElementById('edit-address-card');

            const postInfo = document.getElementById('post-info').textContent;
            const roadInfo = document.getElementById('road-info').textContent;
            const villageInfo = document.getElementById('village-info').textContent;
            const districtInfo = document.getElementById('district-info').textContent;

            $('input[name="post"]').val(postInfo);
            $('input[name="road"]').val(roadInfo);
            $('input[name="village"]').val(villageInfo);
            $('input[name="district"]').val(districtInfo);

            formValidate();

            addressInfo.style.display = 'none';
            editCard.classList.remove('hidden');
        });

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
    });
</script>

@endsection