@extends('pages.layouts.app')
    @section('content')
        <section class="tearms_and_condition" style="background-color: #F1F2F4">
            <div class="div" style="height: 100px; width: 100%; background-color: black">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center float-right text-white" style="margin-top: 50px">FAQs & Working Process</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container unselectable" >
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-5">
                        <h3 class="text-center mt-4 mb-5">Corporate Ask "FAQ & Working Process"</h3>
                    
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>1. সিভি এবং রিজুমির মধ্যে তফাত কি?</strong>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - জব পারাপাসে আপনি রিজুমি ব্যাবহার করবেন <br/>
                                            - একাডেমীক পারপাসে আপনি সিভি ব্যাবহার করবেন
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <strong>2. 	ওয়ান টু ওয়ান সেশন কি?</strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - আপনার বর্তমান সিভি/রিজুমি ইভালুয়েশন করে আপনার সিরিয়াল অনুযায়ী আপনাকে কল করে (প্রফেশনাল  সিভি রাইটার) আপনার সাথে অনলাইন মিটিং (ওয়ান টু ওয়ান সেশন) করে নিবেন, আপনার ক্যারিয়ার গোল, অবজেক্টিভ, পারস্পেকটিভ, জব এক্সপেরিয়েন্স, এচিভমেন্ট জেনে নেয়া হবে। এবং সে অনুযায়ী আপনার ফাইনাল সিভি তৈরি করা হবে। 
                                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>3. আমার সিভি/ রিজুমি দেখতে কেমন হবে? ফরম্যাট কেমন হবে? কালারফুল হবে কি? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - আমরা মূলত কন্টেন্ট নির্ভর এবং এচিভমেনট বেইজড সিভি/ রিজুমি তৈরি করে থাকি। আপনার সাথে মিটিং এ থেকে প্রাপ্ত তথ্য গুলো বেস্ট ভাবে সিভি/ রিজুমি তে প্রকাশ করাই আমাদের মূল লক্ষ্য থাকবে। যেন একজন এইচ আর প্রফেশনাল সংক্ষিপ্ত সময়ের মাঝে আপনাকে ইভালুইয়েট করতে পারে, যা আপনার ইন্টারভিউ কল পাবার সম্ভাবনা বাড়াবে। আমরা সিভি তৈরি এর সময় ৩ টি বিষয়কে প্রাধান্য দিয়ে থাকি। গ্লোবাল স্ট্যান্ডার্ড মেইনটেইন, ATS Friendly এবং প্রেজেন্টেশন অফ ইনফরমেশন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading4">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>4.  স্যাম্পল সিভি/ রিজুমি দেখতে পেতে পারি? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - দুঃখিত, সঙ্গত এবং পলিসিগত কারণে আমরা স্যাম্পল/ ডেমো শেয়ার করি না।
                                        <br/>
                                        প্রতিটি মানুষের কনটেন্ট আলাদা, কাজের ধরন এবং প্রকৃতি আলাদা। এচিভমেন্ট, কন্ট্রিবিউশন এবং পারস্পেকটিভ ভিন্ন। আমরা মূলত কন্টেন্ট নির্ভর এবং এচিভমেনট বেইজড সিভি/ রিজুমি তৈরি করে থাকি।

আমরা আপনার সাথে মিটিং করবো, আপনাকে কিছু প্রশ্নের মাধ্যমে আপনার ক্যারিয়ার গোল, অবজেক্টিভ, পারস্পেকটিভ, জব এক্সপেরিয়েন্স, এচিভমেন্ট জেনে নেয়া হবে। আমাদের লক্ষ্য থাকবে বেস্ট ওয়ে তে আপনাকে প্রেজেনট করা। সিভি আপনার নিজের আয়না, আপনি নন আপনার সিভি সবার আগে নিয়োগকর্তার কাছে যাবে। একটা প্রফেশনাল সিভি আপনার ইন্টারভিউ কল পাবার সম্ভাবনা বাড়াবে। যত বেশি কল তত বেশি আপনি নিজেকে প্রুভ করবার সুযোগ পাবেন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading5">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>5. এচিভমেনট বেইজড সিভি/ রিজুমি কি? প্রফেশনাল রাইটার কে দিয়ে সিভি/রিজুমি লিখিয়ে নেয়ার সুবিধা কি? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - আমরা যে অরগানাইজেশন গুলোতে কাজ করি সেসব জায়গায় বলার মত অনেক কন্ট্রিবিউশন গুলো থাকে,আপনি কোথায় কি ভ্যালু এড করেছেন, আপনার অর্জন গুলো কি কি, আলটিমেটলি আপনার দক্ষতা গুলো কোন কোন জায়গায় রয়েছে, এসব কিছু নিজে নিজে হুট করে বের করা যায়না, পাশাপাশি সিভির কোথায় কোন তথ্য দিয়ে সাজালে পারফেক্ট হবে এটাও জানা থাকেনা, ভাষা বা শব্দ প্রয়োগেরও একটা ব্যপার থাকে।  এজন্যই এই জায়গাটাতে প্রফেশনালের হেল্প নিতে হয়।  

                                            আমরা আপনার সাথে মিটিং করবো, আপনাকে কিছু প্রশ্নের মাধ্যমে আপনার ক্যারিয়ার গোল, অবজেক্টিভ, পারস্পেকটিভ, জব এক্সপেরিয়েন্স, এচিভমেন্ট জেনে নেয়া হবে। আমাদের লক্ষ্য থাকবে বেস্ট ওয়ে তে আপনাকে প্রেজেনট করা।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading6">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>6. ফরম্যাট নাকি কনটেন্ট? এচিভমেনট বেইজড সিভি/ রিজুমি কেন দরকার? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - সিভি রাইটিং এ কন্টেন্টের গুরুত্ব সবচেয়ে বেশি, ফর্মেট বলতে বেসিকালি যা বোঝায়, তা হচ্ছে জাস্ট আপনার লাইন ঠিক রাখা, মার্জিন, ফন্ট, এলাইনমেন্ট ঠিকঠাক থাকা, সিকোয়েন্স ঠিক থাকা এটুকুই, বাকি পুরোটা কৃতিত্ব কন্টেন্টের। আর তাই আমরা খুবই সিম্পল ভাবে সিভি বানাই। একটা ক্লাস ফাইভের বাচ্চাও আমাদের বানানো সিভি পড়ে একজন মানুষ সম্পর্কে ধারনা করতে পারবে। এই ব্যাপারটাকে আমি তিনটা লজিক দিয়ে ব্যাখ্যা করবো।
                                            <br/> <br/>
                                            দেখুন প্রতিটি মানুষ দেখতে মুটামুটি একই রকম। দুই হাত, দুই চোখ, দুই পা, দুই কান, নাক, মুখ একই রকম। কিন্তু দুইজন মানুষ কি আসলে এক হতে পারে? উত্তর না, কারন বাইরে থেকে সকল মানুষ মুটামুটি একই ফর্মেটে বানানো হলেও, দেখুন, কেউ ডাক্তার, কেউ ইঞ্জিনিয়ার, কেউ উকিল, কেউ অভিনেতা। মানে হচ্ছে, একই ফর্মেটে তৈরি মানুষ যে যেরকম কন্টেন্ট কনজিউম করেছে, সে সেরকম হয়েছে। একইভাবে রিজুমির ক্ষেত্রেও ভিন্নতা আসে কন্টেন্টে।
                                            <br/> <br/>
                                            ল্যাপটপের কথা চিন্তা করুন, প্রায় সব ল্যাপটপ বাইরে থেকে দেখতে একই রকম, কিন্তু কোন ল্যাপটপ কেমন পারফর্ম করবে ডিপেন্ড করে এর কনফিগারেশনের উপর। অর্থাৎ ল্যাপটপের ভেতরে যেরকম কনফিগারেশন ও সফটওয়্যার দেয়া থাকবে, ল্যাপটপ তেমনটাই পারফর্ম করবে।
                                            <br/> <br/>
                                            সবশেষে লিংকডইন দেখুন, লিংকডইনকে আমরা বলছি ডিজিটাল সিভি বা প্রোফাইল। দুনিয়ার সব মানুষের লিংকডইন প্রোফাইল একইভাবে করা, সেম ফর্মেট, ওটা ইন্টারনালি ওভাবেই বিল্ড। তার পরেও একজনের প্রোফাইলের সাথে আরেকজনের প্রোফাইলের মিল নাই কেন? আবার সেই একই উত্তর, কারন হচ্ছে কন্টেন্ট। একেক জন একেক কাজ করছেন, একেক জনের কন্ট্রিবিউশন একেক রকম, ক্যারিয়ার গ্রোথ একেক রকমের, তাই একই ফর্মেটের ভিতরেই ভিন্ন ভিন্ন কন্টেন্ট দিয়ে সবার লিংকডইন প্রোফাইল বাহ্যিক ভাবে একই রকম ভাবে সাজানো থাকে।
                                            <br/> <br/>
                                            আমাদের কাছ থেকে যারা সিভি আপডেট করাবেন, আমরা স্পষ্ট বলতে চাই, দুনিয়ার সবচেয়ে সরল ফর্মেটে আমরা কাজ করি। আমাদের সিভির চেয়ে সরল, সহজ বোদ্ধ ও রিচ কন্টেন্ট সচরাচর চোখে পড়বে না। আমরা কন্টেন্টের ইউনিকনেস নিয়ে কাজ করে থাকি। 
                                            <br/> <br/>
                                            অ্যাচিভমেন্ট নিয়ে কাজ করি। ফরমেটিং মানে আপ ডাউন, আর ডান বাম করা, এগুলো কোন কিছুই আমাদের সিভিতে থাকে না। কোন কালার, শেপ, শেড, টেবিল, বক্স কিচ্ছু থাকবে না। থাকবে পাওয়ার ওয়ার্ড, স্মার্ট কন্টেন্ট, অ্যাচিভমেন্ট এগুলো। কন্টেন্ট বিবেচনায় আমাদের প্রতিটি সিভি ইউনিক এবং এটিএস সফটওয়্যার ফ্রেন্ডলি।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading7">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>7. আপনাদের সিভি/রিজুমি কি গ্লোবালি এক্সপটেড? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                                    <div class="card-body">
                                        <p  class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - জ্বি। আমরা সিভি/রিজুমি তৈরি এর সময় গ্লোবাল স্ট্যান্ডার্ড মেইনটেইন করি। আর যেহেতু প্রফেশনাল রাইটার আপনার সাথে ওয়ান টু ওয়ান সেশন করে ফাইনাল কাজ করবেন, আপনার পারস্পেকটিভ অনুযায়ী কিভাবে কাজ করলে আপনার গ্রহনযোগ্যতা বাড়বে সেভাবেই আপনার কাজটি করা হবে।
                                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading8">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>8. আপনারা কি কতদিন যাবত এই সার্ভিস প্রদান করছেন? আপনাদের থেকে কারা সার্ভিস নিয়েছেন?</strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                    <div class="card-body">
                                        <p  class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - আমারা ২০১৬ সাল থেকে বাংলাদেশের পাইওনিয়র প্রতিষ্ঠান হিসেবে সিভি/ রিজুমি রাইটিং এর সার্ভিস প্রদান করে আসছি। গত ৫ বছরে বাংলাদেশ সহ উন্নত বিশ্বের বিভিন্ন প্রফেশনাল মানুষকে আমরা সার্ভিস প্রদান করে এসেছি সফলতার সাথে। গত ৫ বছরে আমরা প্রায় ১২০০০+ সিভির কাজ করেছি। লিংকডিন থেকে আমাদের রেকমেনডেশন গুলো দেখতে পারেন। https://www.linkedin.com/in/niaz-ahmed/
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading9">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>9. বিডি জবস আপডেট করবেন কিভাবে?</strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - বিডি জবস আপডেট এর জন্য আপনার আইডি এবং পাসওয়ার্ড শেয়ার করতে হবে। আপনার ফাইনাল সিভি অনুসারে আপনার পারস্পেকটিভ অনুসারে কি ওয়ার্ড জেনারেট করা হবে, আপনার ক্যারিয়ার সামারি, জব ডেসক্রিপশন, স্কিল সমস্ত কিছু আপডেট করা হবে। আপনার নেক্সট রোল কি হতে পারে সে অনুযায়ী প্রোফাইল বিলড আপ করা হবে, যেন আপনি যেই জব করতে আগ্রহী, সহজেই নোটিফিকেশন গুলো পান এবং ডিরেক্ট জবে এপ্লাই করতে পারেন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading10">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapseThree">
                                            <strong> 10.  লিংকডিন আপডেট করবেন কিভাবে? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - লিংকডিন আপডেট এর জন্য আপনার আইডি এবং পাসওয়ার্ড শেয়ার করতে হবে। আমারা আপনার প্রোফাইল অল স্টার করবো। সমস্ত কনটেন্ট আপডেট করা হবে। আপনার ক্যারিয়ার সামারি, জব ডেসক্রিপশন, স্কিল সমস্ত কিছু আপডেট করা হবে। আপনার নেক্সট রোল কি হতে পারে সে অনুযায়ী প্রোফাইল বিলড আপ করা হবে, যেন আপনি যেই জব করতে আগ্রহী, সহজেই নোটিফিকেশন গুলো পান এবং ডিরেক্ট জবে এপ্লাই করতে পারেন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading11">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>11. বিডিজবস এবং লিংকডিন এর পাসওয়ার্ড ভুলে গিয়েছি। এখন কি করবো? </strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            আইডি পাসওয়ার্ড ভুলে গিয়ে থাকলে সেটা রিকভার করাই উত্তম। <br/> <br/>

                                            নতুন আইডি খুললে লিংকডইন একই ইনফরমেশনে দুইটা আইডি পাবে। এতে করে সে যে কোন একটা বা দুইটা আইডিই রেস্ট্রিকটেড করে দিতে পারে।
                                            <br/> <br/>
                                            তখন আপনাকে পাসপোর্ট বা এনআইডি লিংকডইনকে পাঠিয়ে রেস্ট্রিকশন উঠিয়ে নিতে হবে। এর কিছুদিন পর আবার দুইটা আইডি থাকায় একই সমস্যা হবে। আর তাছাড়া কেউ আপনাকে সার্চ করে আপনাকে খুজতে গেলেও দুইটা আইডি পাবে। তখন তিনি কিভাবে বুঝব্ন কোন আইডিটা আপনি চালাচ্ছেন আর কোনটা চালাচ্ছেন না?এতে করে অনেক অনেক স্কোপ হারাবেন আপনি। এই দিকটায় খেয়াল করবেন।
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading12">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapseThree">
                                            <strong>12. আমার আইডি পাসওয়ার্ড এর নিরপত্তা কি?</strong>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
                                    <div class="card-body">
                                        <p class="text-justify" style="font-size: 16px; font-family: sans-serif; line-height: 30px">
                                            - আমরা প্রফেশনাল সার্ভিস প্রদান করছি। আমরা কখনোই আইডি এবং পাসওয়ার্ড সংরক্ষণ/ সেইভ করি না। কাজ শেষে আপনাকে জানিয়ে দেয়া হবে। আপনি আপনার মতো করে চাইলে আপনার পাসওয়ার্ড পরিবর্তন করে ফেলতে পারবেন।
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection
