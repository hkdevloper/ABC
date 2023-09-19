@extends('layouts.main-user-list')

@section('head')
    <style>
        div:hover > .verticalTrack {
            opacity: 1 !important;
            transition: all 0.3s !important;
        }

        .width100 {
            width: 100%;
            display: inline-block;
        }

        .imageWrapper .itemContainer .origImg {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .imageWrapper {
            position: relative;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .imageWrapper .blurImage {
            position: absolute;
            z-index: 2;
            height: 102%;
            width: 102%;
            margin: -5px;
            filter: blur(6px);
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .imageWrapper .itemContainer .origImg {
            position: absolute;
            height: 100%;
            z-index: 3;
            max-width: 100%;
        }

        .read-more-text {
            font-family: Inter, Inter-Fallback;
            font-weight: 400;
            font-size: 13px;
            line-height: 18px;
        }

        .read-more {
            line-height: 14px;
        }

        .read-more-text {
            color: #1b2437;
            overflow-wrap: break-word;
        }

        .company-page {
            position: relative;
        }

        .rightContainer > div {
            width: 100% !important;
        }

        .company-page * {
            font-family: var(--font-family, "Satoshi") !important;
        }

        .company-page-header {
            position: relative;
            z-index: 1;
            width: 100%;
            min-height: 104px;
            background: rgba(239, 237, 255, 0.8);
        }

        .company-page-body-wrapper {
            border-radius: 28px 28px 0 0;
            background: #f8f9fa;
            position: relative;
            z-index: 2;
        }

        .company-page-body-wrapper .company-page-body {
            width: 1120px;
            margin: 0 auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .company-page .anchor-label {
            font-family: inherit;
            color: inherit;
            -webkit-transition: none;
            -o-transition: none;
            transition: none;
            text-decoration: none;
        }

        .tabs-container .tab-list-placeholder {
            height: 64px;
            display: none;
        }

        .tabs-container .tab-list-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .tabs-container .tab-list-wrapper .tab-list {
            list-style: none;
            margin-bottom: 0;
            padding-top: 24px;
            z-index: 98;
            height: 54px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .tabs-container .tab-list-wrapper .tab-list .tab-list-item {
            display: inline-block;
            padding: 0 12px;
            -webkit-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
            color: var(--N600);
            font-size: 18px;
            line-height: 23px;
            font-weight: 500;
            cursor: pointer;
        }

        .tabs-container .tab-list-wrapper .tab-list .tab-list-item:before {
            display: block;
            content: attr(data-tab);
            content: attr(data-tab) / "";
            height: 0;
            visibility: hidden;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: none;
            font-weight: 700;
        }

        .tabs-container .tab-list-wrapper .tab-list .tab-list-item.tab-list-active {
            position: relative;
            font-weight: 700;
            color: var(--N800);
        }

        .tabs-container
        .tab-list-wrapper
        .tab-list
        .tab-list-item.tab-list-active:after {
            content: "";
            position: absolute;
            background-color: var(--N800);
            width: 100%;
            height: 3px;
            top: 27px;
            left: 0;
            border-radius: 10px 10px 0 0;
        }

        .tabs-container .tab-list-wrapper .tab-list .tab-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin-right: 30px;
        }

        .tabs-container .tab-content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
        }

        .tabs-container .tab-content .leftContainer {
            min-width: 0;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 700px;
            flex: 0 0 700px;
        }

        .tabs-container .tab-content .leftContainer > div:first-child {
            margin-top: 30px;
        }

        .tabs-container .tab-content .rightContainer {
            margin-left: 20px;
            min-width: 0;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 400px;
            flex: 0 0 400px;
            margin-top: 30px;
        }

        .tabs-container .parition {
            width: 100%;
            border-width: 0;
            color: #eee;
            background-color: #eee;
            height: 1px;
            margin: 0;
        }

        .more-info .links,
        .more-info .val {
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }

        .more-info {
            margin-top: 16px;
            background: var(--N100);
            -webkit-box-shadow: 0 6px 12px rgba(30, 10, 58, 0.04);
            box-shadow: 0 6px 12px rgba(30, 10, 58, 0.04);
            border-radius: 20px;
            padding: 24px;
        }

        .more-info .more-info-title {
            color: var(--N800);
            padding-bottom: 12px;
        }

        .more-info .items {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .more-info .items {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .more-info .info-item {
            width: 50%;
            padding-bottom: 8px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: baseline;
            -ms-flex-align: baseline;
            align-items: baseline;
        }

        .more-info .key-label {
            display: inline-block;
            color: var(--N800);
        }

        .more-info .val {
            color: var(--N700);
        }

        .more-info .links {
            color: var(--P100);
        }

        .more-info .links a {
            color: var(--P100);
            font-weight: 700;
            font-size: 14px;
            line-height: 18px;
        }

        .company-info-container .company-info .heading-line .company-info-rnr .reviews,
        .company-info-container .company-info .heading-line .head-cont {
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }

        .company-info-container {
            position: relative;
            min-height: 150px;
        }

        .company-info-container .company-photo {
            position: absolute;
            top: -42px;
        }

        .company-info-container .company-photo .company-photo-wrapper {
            position: relative;
            height: 160px;
            width: 160px;
            overflow: hidden;
            border: 2px solid var(--N400);
            border-radius: 26px;
        }

        .company-info-container .company-photo .company-photo-wrapper .photo {
            height: 104%;
            width: 104%;
            margin: -2px;
            border-radius: 12px 6px;
        }

        .company-info-container .company-info {
            position: relative;
            left: 180px;
            max-width: 633px;
            padding-top: 20px;
        }

        .company-info-container .company-info .heading-line {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .company-info-container .company-info .heading-line .head-cont {
            color: var(--N800);
            max-width: 71%;
            line-height: 31px;
        }

        .company-info-container .company-info .heading-line .company-info-rnr {
            padding-left: 12px;
            color: var(--N600);
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-top: 5px;
        }

        .company-info-container .company-info .heading-line .company-info-rnr .star {
            color: var(--I300);
            margin-right: 4px;
            font-size: 12px;
        }

        .company-info-container
        .company-info
        .heading-line
        .company-info-rnr
        .vertical-separator {
            background-color: var(--N400);
            width: 1px;
            height: 10px;
            border-radius: 1px;
            margin-left: 5px;
            margin-right: 5px;
        }

        .company-info-container .company-info .heading-line .company-info-rnr .reviews {
            color: var(--N500);
            max-width: 105px;
        }

        .company-info-container .company-info .tag-line {
            padding-top: 10px;
            color: var(--N700);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .Banner {
            height: 370px;
            position: relative;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .Banner.isCoverBanner {
            height: calc(25vw - 20px);
            min-height: 300px;
            max-height: 500px;
        }

        .Banner .banner-image-wrapper {
            height: 400px;
            width: 100%;
        }

        .Banner .banner-image-wrapper.isCoverBanner {
            height: 25vw;
            position: absolute;
            min-height: 320px;
            max-height: 520px;
        }

        .Banner .banner-image-wrapper.isCoverBanner .cover-gradiant {
            position: absolute;
            width: 100%;
            top: unset;
            bottom: 0;
            left: 0;
            background: -o-linear-gradient(
                269.31deg,
                hsla(0, 0%, 100%, 0.0001) 33.7%,
                rgba(6, 12, 47, 0.4) 86.94%,
                rgba(6, 12, 47, 0.4) 97.53%
            );
            background: linear-gradient(
                180.69deg,
                hsla(0, 0%, 100%, 0.0001) 33.7%,
                rgba(6, 12, 47, 0.4) 86.94%,
                rgba(6, 12, 47, 0.4) 97.53%
            );
            mix-blend-mode: normal;
            -webkit-transform: matrix(-1, 0, 0, 1, 0, 0);
            -ms-transform: matrix(-1, 0, 0, 1, 0, 0);
            transform: matrix(-1, 0, 0, 1, 0, 0);
            height: 412px;
            z-index: 4;
        }

        .Banner .right-text {
            color: #fff;
            font-size: 14px;
            letter-spacing: -0.1px;
            line-height: 11px;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .claimNowWapper {
            position: relative;
            width: 1120px;
            margin: 0 auto;
        }

        .claimNowWapper .right-text {
            color: #fff;
            font-size: 12px;
            position: absolute;
            bottom: 16px;
            right: 0;
            z-index: 6;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            letter-spacing: -0.2px;
            line-height: 22px;
        }

        .claimNowWapper .right-text .managed {
            font-size: 14px;
            line-height: 18px;
            color: var(--N300);
            padding-right: 6px;
        }

        .claimNowWapper .right-text .company {
            color: var(--N600);
            margin-right: 4px;
        }

        .claimNowWapper .right-text i {
            color: #47b749;
            font-size: 16px;
        }

        .typ-40Medium {
            font-size: 40px;
            font-weight: 500;
            line-height: 31px;
        }

        .typ-24Black {
            font-size: 24px;
            font-weight: 900;
            line-height: 30px;
        }

        .typ-20Bold {
            font-size: 20px;
            font-weight: 700;
            line-height: 26px;
        }

        .typ-18Bold {
            font-size: 18px;
            font-weight: 700;
            line-height: 23px;
        }

        .typ-16Bold {
            font-weight: 700;
        }

        .typ-16Bold,
        .typ-16Medium {
            font-size: 16px;
            line-height: 20px;
        }

        .typ-16Medium {
            font-weight: 500;
        }

        .typ-14Bold {
            font-weight: 700;
        }

        .typ-14Bold,
        .typ-14Medium {
            font-size: 14px;
            line-height: 18px;
        }

        .typ-14Medium {
            font-weight: 500;
        }

        .typ-12Bold {
            font-weight: 700;
        }

        .typ-12Bold,
        .typ-12Medium {
            font-size: 12px;
            line-height: 15px;
        }

        .typ-12Medium {
            font-weight: 500;
        }

        .typ-11Bold {
            font-weight: 700;
        }

        .typ-11Bold,
        .typ-11Medium {
            font-size: 11px;
            line-height: 14px;
        }

        .typ-11Medium {
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="company-page">
        <div class="company-page-header">
            <div data-test="banner" class="Banner  isCoverBanner">
                <div class="banner-image-wrapper isCoverBanner">
                    <div data-test="imageWrapper" class="imageWrapper   ">
                        <div class=" blurImage"
                             style="background-image: url('https://via.placeholder.com/100x100');"></div>
                        <div class="itemContainer">
                            <img data-test="origImg" class="origImg "
                                 src="https://via.placeholder.com/1920x600"
                                 alt="Image">
                            <div class="cover-gradiant"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="company-page-body-wrapper">
            <div class="company-page-body">
                <div class="claimNowWapper">
                    <div data-test="claimNow" class="right-text">
                        <span class="managed">Your Company?
                            <a href="#" class="text-purple-900 underline">Claim Now</a>
                        </span>
                    </div>
                </div>
                <div class="company-info-container">
                    <div class="company-photo">
                        <div class="company-photo-wrapper">
                            <img class="photo" src="https://via.placeholder.com/160x160" alt="media" height="160"
                                 width="160">
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="heading-line"><h1 class="head-cont typ-24Black " title="HkDevelopers">
                                HkDevelopers</h1><a
                                class="company-info-rnr"
                                href="https://www.ambitionbox.com/reviews/bharti-HkDevelopers-reviews?utm_campaign=companyPage_ratings&amp;utm_medium=desktop&amp;utm_source=naukri"
                                title="Powered by Ambition Box" target="_blank"><i
                                    class="naukicon naukicon-rating-yellow-star star"></i><span
                                    class="typ-14Bold">4.0 </span>
                                <div class="vertical-separator"></div>
                                <span class="reviews typ-14Medium">(10.9K reviews)</span></a></div>
                        <div class="tag-line typ-14Medium mb-2">Express Yourself</div>
                        <div class="chips-container p-2">
                            <span class="chip px-2 py-1 card typ-14Medium">Telecom / ISP</span>
                            <span class="chip px-2 py-1 card typ-14Medium">Public</span>
                            <span class="chip px-2 py-1 card typ-14Medium">Indian MNC</span>
                            <span class="chip px-2 py-1 card typ-14Medium">B2C</span>
                            <span class="chip px-2 py-1 card typ-14Medium">B2B</span>
                        </div>
                        <div class="flex space-x-4 mt-2">
                            <a class="flex items-center cursor-pointer hover:bg-blue-100 card p-2">
                                <div class="text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M400 255.4V240 208c0-8.8-7.2-16-16-16H352 336 289.5c-50.9 0-93.9 33.5-108.3 79.6c-3.3-9.4-5.2-19.8-5.2-31.6c0-61.9 50.1-112 112-112h48 16 32c8.8 0 16-7.2 16-16V80 64.6L506 160 400 255.4zM336 240h16v48c0 17.7 14.3 32 32 32h3.7c7.9 0 15.5-2.9 21.4-8.2l139-125.1c7.6-6.8 11.9-16.5 11.9-26.7s-4.3-19.9-11.9-26.7L409.9 8.9C403.5 3.2 395.3 0 386.7 0C367.5 0 352 15.5 352 34.7V80H336 304 288c-88.4 0-160 71.6-160 160c0 60.4 34.6 99.1 63.9 120.9c5.9 4.4 11.5 8.1 16.7 11.2c4.4 2.7 8.5 4.9 11.9 6.6c3.4 1.7 6.2 3 8.2 3.9c2.2 1 4.6 1.4 7.1 1.4h2.5c9.8 0 17.8-8 17.8-17.8c0-7.8-5.3-14.7-11.6-19.5l0 0c-.4-.3-.7-.5-1.1-.8c-1.7-1.1-3.4-2.5-5-4.1c-.8-.8-1.7-1.6-2.5-2.6s-1.6-1.9-2.4-2.9c-1.8-2.5-3.5-5.3-5-8.5c-2.6-6-4.3-13.3-4.3-22.4c0-36.1 29.3-65.5 65.5-65.5H304h32zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V376c0-13.3-10.7-24-24-24s-24 10.7-24 24v64c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z"/>
                                    </svg>
                                </div>
                                <div class="ml-2">
                                    <span class="text-blue-500 text-base font-medium">Share</span>
                                </div>
                            </a>
                            <a class="flex items-center cursor-pointer hover:bg-orange-100 card p-2">
                                <div class="text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/>
                                    </svg>
                                </div>
                                <div class="ml-2">
                                    <span class="text-yellow-500 text-base font-medium">Bookmark</span>
                                </div>
                            </a>
                            <a class="flex items-center cursor-pointer hover:bg-green-100 card p-2">
                                <div class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                                    </svg>
                                </div>
                                <div class="ml-2">
                                    <span class="text-green-500 text-base font-medium">Review</span>
                                </div>
                            </a>
                            <a class="flex items-center cursor-pointer hover:bg-purple-100 card p-2">
                                <div class="text-purple-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M88.2 309.1c9.8-18.3 6.8-40.8-7.5-55.8C59.4 230.9 48 204 48 176c0-63.5 63.8-128 160-128s160 64.5 160 128s-63.8 128-160 128c-13.1 0-25.8-1.3-37.8-3.6c-10.4-2-21.2-.6-30.7 4.2c-4.1 2.1-8.3 4.1-12.6 6c-16 7.2-32.9 13.5-49.9 18c2.8-4.6 5.4-9.1 7.9-13.6c1.1-1.9 2.2-3.9 3.2-5.9zM0 176c0 41.8 17.2 80.1 45.9 110.3c-.9 1.7-1.9 3.5-2.8 5.1c-10.3 18.4-22.3 36.5-36.6 52.1c-6.6 7-8.3 17.2-4.6 25.9C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.8-2.2 9.6-4.5 14.2-6.8c15.1 3 30.9 4.5 47.1 4.5c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176zM432 480c16.2 0 31.9-1.6 47.1-4.5c4.6 2.3 9.4 4.6 14.2 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.8 2-19-4.6-25.9c-14.2-15.6-26.2-33.7-36.6-52.1c-.9-1.7-1.9-3.4-2.8-5.1C622.8 384.1 640 345.8 640 304c0-94.4-87.9-171.5-198.2-175.8c4.1 15.2 6.2 31.2 6.2 47.8l0 .6c87.2 6.7 144 67.5 144 127.4c0 28-11.4 54.9-32.7 77.2c-14.3 15-17.3 37.6-7.5 55.8c1.1 2 2.2 4 3.2 5.9c2.5 4.5 5.2 9 7.9 13.6c-17-4.5-33.9-10.7-49.9-18c-4.3-1.9-8.5-3.9-12.6-6c-9.5-4.8-20.3-6.2-30.7-4.2c-12.1 2.4-24.7 3.6-37.8 3.6c-61.7 0-110-26.5-136.8-62.3c-16 5.4-32.8 9.4-50 11.8C279 439.8 350 480 432 480z"/>
                                    </svg>
                                </div>
                                <div class="ml-2">
                                    <span class="text-purple-500 text-base font-medium">Direct Message</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="tabs-container">
                    <div class="tab-list-wrapper  ">
                        <div class="tab-list ">
                            <div class="tab-wrapper">
                                <div data-tab="Overview" class="tab-list-item tab-list-active"><a
                                        href="https://www.naukri.com/HkDevelopers-overview-126896" class="anchor-label">Overview</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="tab-content" style="top: 45px;">
                        <div class="leftContainer Overview">
                            <div class="about-us mediaAbout card p-4"><h2
                                    class="about-us-title typ-16Bold">About us</h2>
                                <div class="content-container">
                                    <div class="read-more ">
                                        <span class="typ-14Medium">
                                            HkDevelopers is a leading global telecommunications company with operations in 18 countries across Asia and Africa. Headquartered in New Delhi, India, the company ranks amongst the top 3 mobile service providers globally in terms of subscribers. In India, the company's product offerings include 2G, 3G and 4G wireless services, mobile commerce, fixed line services, high speed home broadband, DTH, enterprise services including national & international long distance services to carriers. In the rest of the geographies, it offers 2G, 3G, 4G wireless services and mobile commerce. HkDevelopers had over 403 million customers across its operations at the end of March 2019.
                                            <br>
                                            <br>
                                            Over the last 5 years, the company has transformed from a pure-play mobile operator to a portfolio of business. HkDevelopers has a leadership position in mobile broadband with a pan India 3G/4G footprint. In addition, HkDevelopers has a dominant share of the mobile enterprise market and an extensive national and international fiber backbone. This has helped us transform into a truly integrated telecommunications company.
                                            <br>
                                            <br>
                                            HkDevelopers is committed to delivering delightful customer experiences and together with our group companies, we are building a future ready network that touches every Indian. Guided by the vision of HkDevelopers with our group companies, we are committed to contributing towards building a digitally empowered society.
                                            <br>
                                            <br>
                                            HkDevelopers is a listed company and is a part of HkDevelopers Group.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="more-info mb-4 card p-4">
                                <h4 class="more-info-title typ-16Bold">More Information</h4>
                                <table class="w-full">
                                    <tr class="info-item">
                                        <td class="key-label typ-14Bold">Type</td>
                                        <td class=" typ-14Bold">:</td>
                                        <td class="val typ-14Medium">Public</td>
                                    </tr>
                                    <tr class="info-item">
                                        <td class="key-label typ-14Bold">Founded</td>
                                        <td class=" typ-14Bold">:</td>
                                        <td class="val typ-14Medium">1995<span class="years"> (28 yrs old)</span></td>
                                    </tr>
                                    <tr class="info-item">
                                        <td class="key-label typ-14Bold">Company Size</td>
                                        <td class=" typ-14Bold">:</td>
                                        <td class="val typ-14Medium">10001-50000</td>
                                    </tr>
                                    <tr class="info-item">
                                        <td class="key-label typ-14Bold">Headquarters</td>
                                        <td class=" typ-14Bold">:</td>
                                        <td class="val typ-14Medium">Gurgaon/Gurugram, Haryana</td>
                                    </tr>
                                    <tr class="info-item">
                                        <td class="key-label typ-14Bold">Website</td>
                                        <td class=" typ-14Bold">:</td>
                                        <td class="links typ-14Bold"><a href="https://www.HkDevelopers.in/"
                                                                        target="_blank">https://www.HkDevelopers.in/</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="rightContainer Overview">
                            @include('includes.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
