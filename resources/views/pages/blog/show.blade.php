@extends('layouts.app')

@section('title', $blogData['title'] . ' | Calculators Blog')

@section('meta-description', substr($blogData['excerpt'], 0, 160))

@section('keywords', 'calculators, ' . $blogData['category'] . ', ' . implode(', ', explode(' ', substr($blogData['title'], 0, 30))))

@section('canonical', route('blog.show', $blogData['slug']))

@section('og-title', $blogData['title'])
@section('og-description', $blogData['excerpt'])
@section('og-image', $blogData['image'])
@section('og-url', route('blog.show', $blogData['slug']))

@section('content')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $blogData['title'] }}",
  "description": "{{ $blogData['excerpt'] }}",
  "image": "{{ $blogData['image'] }}",
  "datePublished": "{{ $blogData['date'] }}",
  "author": {
    "@type": "Person",
    "name": "{{ $blogData['author'] }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Calculators",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('blog.show', $blogData['slug']) }}"
  }
}
</script>
@endverbatim

<!-- Blog Header with Featured Image -->
<section class="relative w-full h-96 md:h-96 lg:h-[500px] overflow-hidden">
    <img src="{{ $blogData['image'] }}" alt="{{ $blogData['title'] }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
    
    <div class="absolute inset-0 flex items-end">
        <div class="container mx-auto px-4 pb-8 md:pb-12 w-full">
            <div class="mb-4">
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                          {{ in_array($blogData['category'], ['PDF Editing', 'PDF Conversion', 'Editing', 'Conversion']) ? 'bg-red-100 text-red-600' : 
                              (in_array($blogData['category'], ['Digital Signatures', 'PDF Security', 'Security']) ? 'bg-blue-100 text-blue-600' : 'bg-green-100 text-green-600') }}">
                    {{ $blogData['category'] }}
                </span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                {{ $blogData['title'] }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-6 text-white/90 text-sm md:text-base">
                <div class="flex items-center">
                    <i class="fas fa-user mr-2"></i>
                    <span>{{ $blogData['author'] }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <time datetime="{{ $blogData['date'] }}">
                        {{ \Carbon\Carbon::parse($blogData['date'])->format('M d, Y') }}
                    </time>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    <span>{{ $blogData['read_time'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<main class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Article Body -->
            <article class="bg-white rounded-lg shadow-md p-6 md:p-10 mb-8">
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($blogData['content'])) !!}
                </div>
            </article>

            <!-- Back to Blog Button -->
            <div class="mb-8">
                <a href="{{ route('blog') }}" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Blog
                </a>
            </div>

        </div>
    </div>
</main>

<style>
    .prose {
        color: #374151;
    }
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        color: #1f2937;
        font-weight: 700;
        margin-top: 1.5em;
        margin-bottom: 0.5em;
    }
    .prose p {
        margin-bottom: 1em;
    }
    .prose code {
        background-color: #f3f4f6;
        padding: 0.2em 0.4em;
        border-radius: 0.25rem;
        color: #dc2626;
    }
    .prose pre {
        background-color: #1f2937;
        color: #f3f4f6;
        padding: 1em;
        border-radius: 0.5rem;
        overflow-x: auto;
    }
    .prose ul, .prose ol {
        margin-left: 1.5em;
        margin-bottom: 1em;
    }
    .prose li {
        margin-bottom: 0.5em;
    }
    .prose blockquote {
        border-left: 4px solid #dc2626;
        padding-left: 1em;
        color: #6b7280;
        font-style: italic;
    }
    .prose img {
        margin-left: auto;
        margin-right: auto;
        display: block;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        height: auto;
        margin-top: 2em;
        margin-bottom: 2em;
        padding: 0.5rem;
        background-color: #f9fafb;
    }
</style>
@endsection
