@extends('layouts.app')

@section('title', 'Calculators Blog | Tools & Guides')

@section('meta-description', 'Expert insights, tips, and guides on calculators, tools, conversions, and optimization.')

@section('keywords', 'calculators blog, calculators, tools, converters, guides')

@section('canonical', url('/blog'))

@section('og-title', 'Calculators Blog - Expert Guides & Tips')
@section('og-description', 'Learn about calculators, tools, and optimization with our expert blog posts.')
@section('og-image', asset('images/blog-og-image.jpg'))
@section('og-url', url('/blog'))

@section('content')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
    "name": "Calculators Blog",
  "url": "{{ url('/blog') }}",
    "description": "Expert insights and guides on calculators, conversions, and optimization",
  "publisher": {
    "@type": "Organization",
    "name": "Calculators",
    "url": "{{ url('/') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url('/blog') }}"
  }
}
</script>
@endverbatim

<!-- Blog Header -->
<section class="bg-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 text-center mb-8">Blog</h1>

        <!-- Featured hero card (image left, text right on desktop) -->
        <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center">
                @if(!empty($latest))
                    <div class="w-full md:w-1/2">
                        <a href="{{ route('blog.show', $latest['slug']) }}">
                            <img src="{{ $latest['image'] }}" alt="{{ $latest['title'] }}" class="w-full h-72 md:h-96 object-cover">
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 p-6 md:p-10">
                        <div class="text-sm text-gray-500 mb-3">{{ \Carbon\Carbon::parse($latest['date'])->format('M d, Y') }} • {{ $latest['read_time'] }}</div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3"><a href="{{ route('blog.show', $latest['slug']) }}">{{ $latest['title'] }}</a></h2>
                        <p class="text-gray-600 mb-6">{{ $latest['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $latest['slug']) }}" class="inline-block px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Read Article</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<main class="py-12">
    <div class="container mx-auto px-4">

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($blogs as $blog)
            <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1" 
                     itemscope itemtype="https://schema.org/BlogPosting">
                <!-- Blog Image -->
                <div class="relative overflow-hidden">
                    <img src="{{ $blog['image'] }}" 
                         alt="{{ $blog['title'] }}"
                         itemprop="image"
                         class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                </div>

                <!-- Blog Content -->
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <time datetime="{{ $blog['date'] }}" class="flex items-center" itemprop="datePublished">
                            <i class="far fa-calendar mr-1"></i>
                            {{ \Carbon\Carbon::parse($blog['date'])->format('M d, Y') }}
                        </time>
                        <span class="mx-2">•</span>
                        <span class="flex items-center" itemprop="timeRequired">
                            <i class="far fa-clock mr-1"></i>
                            {{ $blog['read_time'] }}
                        </span>
                    </div>

                    <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-red-600 transition-colors" itemprop="headline">
                        <a href="{{ route('blog.show', $blog['slug']) }}" itemprop="url">
                            {{ $blog['title'] }}
                        </a>
                    </h2>

                    <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed" itemprop="description">
                        {{ $blog['excerpt'] }}
                    </p>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('blog.show', $blog['slug']) }}" class="text-red-600 font-semibold hover:text-red-700 transition-colors flex items-center" 
                           itemprop="url" aria-label="Read more about {{ $blog['title'] }}">
                            Read More
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Schema.org Microdata -->
                <meta itemprop="author" content="Calculators Team">
                <meta itemprop="publisher" content="Calculators">
            </article>
            @endforeach
        </div>

    </div>
</main>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Improve focus styles for accessibility */
    button:focus, a:focus {
        outline: 2px solid #dc2626;
        outline-offset: 2px;
    }
</style>
@endsection