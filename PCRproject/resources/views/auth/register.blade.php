@extends('frames.registrationframe')

@section('auth')
    <div class="text-xl p-5">
        
      <form action="{{ route('saveuser') }}" method="POST">
      @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              @error('username')
                <div class="text-red-500 mt-4 text-sm">
                    {{$message}}
                </div>
              @enderror

              <div class="col-span-6 sm:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              @error('email')
                <div class="text-red-500 text-sm">
                    {{$message}}
                </div>
              @enderror


              <div class="col-span-3">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-3">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Repeat Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-3 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              @error('password')
                <div class="text-red-500 mt-4 text-sm">
                    {{$message}}
                </div>
              @enderror

            </div>
        </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Register
                </button>
            </div>
        </div>
      </form>
    </div>
        </form>
    </div>
@endsection
