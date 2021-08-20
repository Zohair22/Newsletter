
@auth
			<x-panel>
						<form action="{{ route ('comment', $post->slug) }}" method="post">
									@csrf
									<header class="flex space-x-6">
												<img src="https://i.pravatar.cc/40?u={{ auth()->user()->id }}" width="40" height="40" alt="Avatar" class="rounded-full">
												<h2>want to participate?</h2>
									</header>
									<div class="mt-4">
												<textarea name="body" id="body" class="w-full border border-gray-100 p-2 text-sm focus:outline-none focus:ring rounded-2xl" rows="5" placeholder="Quick, think of something to say!" required></textarea>
									</div>
									<hr class="my-8">
									<div class="flex justify-end">
												<x-submit-button>Comment</x-submit-button>
									</div>
						</form>
			</x-panel>
@else
			<p class="text-center">
						<a href="{{ route('registerForm') }}" class="text-blue-500 font-semibold">Register</a>
						Or
						<a href="{{ route('loginForm') }}" class="text-blue-500 font-semibold">Login</a>
						to leave a Comment!
			</p>
@endauth