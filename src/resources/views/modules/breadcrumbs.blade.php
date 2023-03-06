<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Försäkringar",
    "item": "{{\URL::secure('/')}}"
    },{
    "@type": "ListItem",
    "position": 2,
    "name": "{{$category['name']}}",
    "item": "{{\URL::secure('/'.$category['slug'])}}"
    },{
    "@type": "ListItem",
    "position": 3,
    "name": "{{$insurance->name}}",
    "item": "{{\URL::secure('/'.$category['slug'].'/'.$insurance->slug)}}"
    }]
}
</script>


<ol class="breadcrumb breadcrumb-white">
    <li><a href="/">Försäkringar</a></li>
    <li><a href="/{{$category['slug']}}">{{$category['name']}}</a></li>
    <li><a href="/{{$category['slug']}}/{{$insurance->slug}}">{{$insurance->name}}</a></li>
</ol>