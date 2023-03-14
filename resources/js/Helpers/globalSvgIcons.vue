<template>
    <span v-if="name == 'search'"
        class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
            <path
                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                fill="currentColor" />
        </svg>
    </span>
    <span v-else-if="name == 'plus'" class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                fill="currentColor" />
            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
        </svg>
    </span>
    <span v-else-if="name == 'edit'" class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3"
                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                fill="currentColor" />
            <path
                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                fill="currentColor" />
        </svg>
    </span>
    <span v-else-if="name == 'delete'" class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                fill="currentColor" />
            <path opacity="0.5"
                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                fill="currentColor" />
            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                fill="currentColor" />
        </svg>
    </span>

    <span v-else-if="name == 'upload'" class="svg-icon svg-icon-3hx svg-icon-primary">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM14.5 12L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L10 12H11.5V17C11.5 17.6 11.4 18 12 18C12.6 18 12.5 17.6 12.5 17V12H14.5Z" fill="currentColor" />
			<path d="M13 11.5V17.9355C13 18.2742 12.6 19 12 19C11.4 19 11 18.2742 11 17.9355V11.5H13Z" fill="currentColor" />
			<path d="M8.2575 11.4411C7.82942 11.8015 8.08434 12.5 8.64398 12.5H15.356C15.9157 12.5 16.1706 11.8015 15.7425 11.4411L12.4375 8.65789C12.1875 8.44737 11.8125 8.44737 11.5625 8.65789L8.2575 11.4411Z" fill="currentColor" />
			<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
		</svg>
	</span>

    <span v-else-if="name == 'copy'" class="svg-icon svg-icon-3">
        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M433.941 65.941l-51.882-51.882A48 48 0 0 0 348.118 0H176c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h224c26.51 0 48-21.49 48-48v-48h80c26.51 0 48-21.49 48-48V99.882a48 48 0 0 0-14.059-33.941zM266 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h74v224c0 26.51 21.49 48 48 48h96v42a6 6 0 0 1-6 6zm128-96H182a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h106v88c0 13.255 10.745 24 24 24h88v202a6 6 0 0 1-6 6zm6-256h-64V48h9.632c1.591 0 3.117.632 4.243 1.757l48.368 48.368a6 6 0 0 1 1.757 4.243V112z"></path></svg>
    </span>

    <span v-else-if="name == 'add'" class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg>
    </span>

    <span  v-else-if="name == 'collapse-arrow'" class="svg-icon svg-icon-1 rotate-180">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
			fill="none">
			<path opacity="0.5"
				d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
				fill="currentColor" />
			<path
				d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
				fill="currentColor" />
		</svg>
	</span>

    <span v-else-if="name == 'mobile-aside'" class="svg-icon svg-icon-1">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
			viewBox="0 0 24 24" fill="none">
			<path
				d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
				fill="currentColor" />
			<path opacity="0.3"
				d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
				fill="currentColor" />
		</svg>
	</span>
    <span v-else-if="name == 'mobile-toggle'"  class="svg-icon svg-icon-1">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
			viewBox="0 0 24 24" fill="none">
			<path
				d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
				fill="currentColor" />
			<path opacity="0.3"
				d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
				fill="currentColor" />
		</svg>
	</span>
    <span v-else-if="name == 'cross'"  class="svg-icon svg-icon-1">
		<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 508.33"><path fill="#EB0100" d="M317.99 323.62c-17.23-19.89-35.3-40.09-54.23-60.09-62.06 59.35-119.53 126.18-161.12 201.73-51.02 92.68-126.31 16.84-92.15-50.33 27.46-61.28 98.07-146.3 182.94-220.07-46.74-41.72-97.97-79.34-154.08-107.07C-42.76 47.2 19.97-20.82 79.37 6.16c50.04 19.82 119.09 70.85 182.26 134.32 63.11-45.86 129.55-81.8 189.45-95.87 13-3.06 50.95-11.33 59.69 1.04 3.29 4.67-.33 11.68-7.08 19.29-22.99 25.96-84.78 67.12-114.72 90.82-21.61 17.11-43.55 34.99-65.37 53.71 23.2 28.81 43.94 58.64 60.47 88.17 14.37 25.66 25.55 51.1 32.42 75.46 3.14 11.13 11.75 43.64 1.38 51.66-3.91 3.03-10.11.16-16.95-5.38-23.34-18.89-61.29-70.77-82.93-95.76z"/></svg>
	</span>

    <span v-else-if="name == 'list'"  class="svg-icon svg-icon-1">
        <svg class="svg-icon" style="width: 1.0322265625em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1057 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M924.903226 1024H132.129032a132.129032 132.129032 0 0 1-132.129032-132.129032V132.129032a132.129032 132.129032 0 0 1 132.129032-132.129032h792.774194a132.129032 132.129032 0 0 1 132.129032 132.129032v759.741936a132.129032 132.129032 0 0 1-132.129032 132.129032z m66.064516-891.870968a66.064516 66.064516 0 0 0-66.064516-66.064516H132.129032a66.064516 66.064516 0 0 0-66.064516 66.064516v759.741936a66.064516 66.064516 0 0 0 66.064516 66.064516h792.774194a66.064516 66.064516 0 0 0 66.064516-66.064516V132.129032z m-132.129032 660.645162H297.290323a33.032258 33.032258 0 0 1 0-66.064517h561.548387a33.032258 33.032258 0 0 1 0 66.064517z m0-165.161291H297.290323a33.032258 33.032258 0 0 1 0-66.064516h561.548387a33.032258 33.032258 0 0 1 0 66.064516z m0-165.16129H297.290323a33.032258 33.032258 0 0 1 0-66.064516h561.548387a33.032258 33.032258 0 0 1 0 66.064516z m0-165.16129H297.290323a33.032258 33.032258 0 0 1 0-66.064517h561.548387a33.032258 33.032258 0 0 1 0 66.064517zM165.16129 726.709677h66.064516v66.064517H165.16129v-66.064517z m0-165.16129h66.064516v66.064516H165.16129v-66.064516z m0-165.16129h66.064516v66.064516H165.16129v-66.064516z m0-165.161291h66.064516v66.064517H165.16129V231.225806z" />
        </svg>
    </span>

    <span v-else-if="name == 'comment'" class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
            <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
            <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
        </svg>
    </span>

    <span class="svg-icon svg-icon-2" v-else-if="name == 'like'">
        <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M967.111111 440.888889c0-39.822222-31.288889-71.111111-71.111111-71.111111H682.666667c-11.377778 0-51.2-17.066667-19.911111-65.422222 19.911111-36.977778 19.911111-176.355556 19.911111-176.355556C682.666667 88.177778 651.377778 56.888889 611.555556 56.888889S540.444444 88.177778 540.444444 128c0 207.644444-199.111111 270.222222-199.111111 270.222222v369.777778c91.022222 31.288889 113.777778 85.333333 227.555556 85.333333h213.333333c39.822222 0 71.111111-31.288889 71.111111-71.111111 0-17.066667-5.688889-31.288889-14.222222-42.666666 39.822222 0 71.111111-31.288889 71.111111-71.111112 0-17.066667-5.688889-34.133333-17.066666-48.355555 28.444444-11.377778 45.511111-36.977778 45.511111-65.422222 0-17.066667-5.688889-34.133333-17.066667-48.355556 25.6-8.533333 45.511111-34.133333 45.511111-65.422222zM199.111111 341.333333H56.888889v483.555556h142.222222c48.355556 0 85.333333-39.822222 85.333333-85.333333V426.666667c0-48.355556-36.977778-85.333333-85.333333-85.333334z" fill="" /></svg>
    </span>

    <span v-else-if="name == 'action'" class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
                <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
            </g>
        </svg>
    </span>

    <span v-else-if="name == 'homeIcon'" class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" /><rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" /><rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" /><rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" /></svg>
    </span>

</template>


<script>
export default {
    props: ['name'],
}
</script>
