<div>
    <div class="flex">
        <!-- Start Content -->
        <div class="w-3/4 py-20 px-20">
            <section id="hero">
                <div class="text-center">
                    <h2 class="font-heading text-5xl sm:text-4xl lg:text-6xl font-thin">Wonderful serenity has taken possession
                        of my entire soul</h2>
                    <p class="text-xl xl:px-40 pt-5 text-stone-700">by <b>Amanda Garfied </b>on 12th Jan 2023</p>
                </div>
            </section>


            <section class="jarallax">
                <img src="{{ asset('image/blogpage-img1.png') }}" alt="" class="px-20">
            </section>

            <!-- content Section Starts -->
            <section id="blog-single-content">
                <div class="container mx-auto px-20 banner-content">
                    <div class="my-10 ">

                        <h3>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                            which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which
                            was created for the bliss of souls like mine.</h3>

                        <p class="py-4">I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil
                            existence, that I
                            neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet
                            I feel that I never was a greater artist than now.</p>

                        <p> When, while the lovely valley teems with vapour around me, and the meridian sun strikes the
                            upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the
                            inner
                            sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to
                            the
                            earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among
                            the
                            stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I
                            feel
                            the presence of the Almighty, who formed us in his own image, and the breath of that universal love
                            which bears and sustains us, as it floats around us in an eternity of bliss; and then, my friend,
                            when
                            darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power,
                            like
                            the form of a beloved mistress, then I often think with longing, Oh, would I could describe these
                            conceptions, could impress upon paper all that is living so full and warm within me, that it might
                            be
                            the mirror of my soul, as my soul is the mirror of the infinite God!
                        </p>
                    </div>

                    <div class="my-10 ">

                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I
                            neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet
                            I feel that I never was a greater artist than now.</p>
                        <p>And but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass
                            by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by
                            me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless
                            indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed
                            us in his own image, and the breath of that universal love which bears and sustains us, as it floats
                            around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and
                            heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress,
                            then I often think with longing, Oh, would I could describe these conceptions, could impress upon
                            paper all that is living so full and warm within me, that it might be the mirror of my soul, as my
                            soul is the mirror of the infinite God!
                        </p>

                        <p class="py-4"><b> When, while the lovely valley teems with vapour around me, and the meridian sun
                                strikes the upper surface of the impenetrable foliage of my trees </b></p>

                        <p>And but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass
                            by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by
                            me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless
                            indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed
                            us in his own image, and the breath of that universal love which bears and sustains us, as it floats
                            around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and
                            heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress,
                            then I often think with longing, Oh, would I could describe these conceptions, could impress upon
                            paper all that is living so full and warm within me, that it might be the mirror of my soul, as my
                            soul is the mirror of the infinite God!
                        </p>
                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I
                            neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet
                            I feel that I never was a greater artist than now.</p>
                        <p>And but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass
                            by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by
                            me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless
                            indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed
                            us in his own image, and the breath of that universal love which bears and sustains us, as it floats
                            around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and
                            heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress,
                            then I often think with longing, Oh, would I could describe these conceptions, could impress upon
                            paper all that is living so full and warm within me, that it might be the mirror of my soul, as my
                            soul is the mirror of the infinite God!
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content -->

        <!-- Start List News -->
        <div class="w-1/4 py-20 pr-20">
            <h4 class="text-2xl font-semibold dark:text-white pb-10">Artikel Lainnya</h4>
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach(['Judul Artikel 1', 'Judul Artikel 2', 'Judul Artikel 3', 'Judul Artikel 4', 'Judul Artikel 5'] as $key => $title)
                    <li class="py-3 sm:py-4">
                        <div class="flex space-x-4 rtl:space-x-reverse">
                            <div class="flex-shrink-0">
                                <a href="{{ route('inner') }}">
                                    <img class="w-20 h-20" src="{{ asset('image/blog'. $key+1 .'.png') }}" alt="Neil image">
                                </a>
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('inner') }}">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $title }}
                                    </p>
                                </a>
                                <p class="text-sm text-gray-500 line-clamp-3 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem optio sed. Ad amet aspernatur corporis hic, ipsam mollitia nemo non omnis perferendis perspiciatis porro sequi sit soluta temporibus, vitae?
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End List News -->
    </div>
</div>
