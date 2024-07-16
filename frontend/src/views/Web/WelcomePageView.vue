<script setup lang="ts">
</script>

<template>
  <div>
    <div class="bg-video w-full h-96">
      <video playsinline loop muted autoplay class="w-full h-full object-cover">
        <source
          src="https://player.vimeo.com/progressive_redirect/download/912634422/rendition/1080p/freedom_to_read_ambient_v2%20%281080p%29.mp4?loc=external&amp;signature=bbff012451c7b4abf2ceaae57cba50451ffed20a97fec697bd749c0e331968ce"
          type="video/mp4"
        />
      </video>
    </div>
    <div class="text-center">
      <div class="mt-5">
        <h1 text-6xl font-bold text-teal mb-4>Welcome to LifeLearn</h1>
        <p class="text-black">Your journey to excellence starts here.</p>
        <p class="py-3 text-black">Join Us Today and Get Started</p>
      </div>
    </div>
    <div class="container">
      <div>
        <div class="grid grid-cols md:grid-cols-2 gap-6 mt-14">
          <el-image
            src="https://www.nea.org/sites/default/files/styles/640wide/public/2021-06/2021-Summer-Learning-1920.jpg?itok=EX5oeJgV"
            alt="Summer Learning"
            class="object-cover w-full h-auto rounded-md"
            fit="cover"
            style="width: 90%; height: 90%"
          ></el-image>
          <el-card class="p-5 w-full">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Meet the next generation of LifeLearn!
            </h2>
            <p>
              Through innovative technologies and interactive methodologies, LifeLearn empowers
              individuals to cultivate authentic lifestyles by seamlessly integrating education into
              their daily lives. By fostering continuous learning and skill development, LifeLearn
              drives innovation across the globe, transforming traditional educational paradigms and
              paving the way for a dynamic and accessible future of learn.
            </p>
            <div class="pt-3">
              <el-button type="primary">read our story</el-button>
            </div>
          </el-card>
        </div>
        <div class="grid grid-cols md:grid-cols-2 gap-6 mt-36">
          <el-div class="p-5 w-full h-full">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Taste the convenience.</h2>
            <p class="text-gray-700 mb-4">
              Try us out! lession and books are at your fingertips. Go ahead,
              <br />download LifelLean now.
            </p>
            <div class="grid grid-cols md:grid-cols-3">
              <a class="inline-block">
                <img
                  src="https://www.foodpanda.com/wp-content/uploads/2023/02/app-apple.png"
                  alt="Apple App"
                  class="hover:opacity-75 transition duration-200"
                />
              </a>
              <a class="inline-block">
                <img
                  src="https://www.foodpanda.com/wp-content/uploads/2023/02/app-google.png"
                  alt="Google Play App"
                  class="hover:opacity-75 transition duration-200"
                />
              </a>
              <a class="inline-block">
                <img
                  src="https://www.foodpanda.com/wp-content/uploads/2023/02/app-huawei.png"
                  alt="Huawei AppGallery"
                  class="hover:opacity-75 transition duration-200"
                />
              </a>
            </div>
          </el-div>
          <el-image
            src="https://blog.schoolspecialty.com/wp-content/uploads/2016/06/Main-6-1200x624.jpg"
            alt="Summer Learning"
            class="object-cover  rounded-md"
            fit="cover"
            style="width: 100%; height: 100%"
          ></el-image>
        </div>
        <div class="grid grid-cols md:grid-cols-2 gap-6 mt-36">
          <el-image
            src="https://www.foodpanda.com/wp-content/uploads/2023/04/jason-goodman-Oalh2MojUuk-unsplash-1024x683.jpg"
            alt="Summer Learning"
            class="object-cover w-full h-auto rounded-md"
            fit="cover"
            style="width: 90%; height: 50%"
          ></el-image>
          <el-div class="p-5 w-full">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Find the job you'd love</h2>
            <p>
              Hungry to make a difference? There’s a seat at our table! Find out how we connect
              tech, passions, projects and people – explore international career opportunities at
              LifeLearn.
            </p>
            <div class="pt-4">
              <a href="https://careers.foodpanda.com" class="inline-block">
                <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Join us!
                </button>
              </a>
            </div>
          </el-div>
        </div>
      </div>
      <div class="text-center mt-24">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Do you know book in system?</h2>
        <p>
          The industry is changing fast! Stay up to date with LifeLearn press. Catch up on the lates
          news, updates and reports here.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
        <!-- Grid Promo Item 1 -->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://www.nea.org/sites/default/files/styles/640wide/public/2024-05/2024-brockton-library.jpg?itok=u3_8Fd68"
              alt="Library"
              class="object-cover w-full h-auto rounded-md"
            />
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            No New Library Books for 30 Years? These Paraeducators Changed That!
          </h3>
          <p class="text-sans-serif text-base mb-6 ml-4 mr-4">
            A large Massachusetts district lacked new and diverse books so library paraeducators
            banded together to get an NEA Read Across America grant for new books.
          </p>
        </div>
        <!-- Grid Promo Item 2 -->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://www.nea.org/sites/default/files/styles/640wide/public/2023-06/2023-juneteenth-book-cover-collage.jpg?itok=L4zVLbNl"
              alt="Juneteenth Books"
              class="object-cover w-full h-auto rounded-md"
            />
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            Books to Celebrate Juneteenth
          </h3>
          <div class="text-sans-serif text-base mb-6 ml-4 mr-4">
            Help students learn about and appreciate the significance of Juneteenth with these
            recommended titles.
          </div>
        </div>
        <!-- Grid Promo Item 3 -->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://www.nea.org/sites/default/files/styles/640wide/public/2024-07/july-grid-96384-childrens-july-nea-1120x630.jpg?itok=K_s_l8IO"
              alt="Juneteenth Book"
              class="object-cover w-full h-auto rounded-md"
            />
          </div>
          <div
            class="absolute top-0 left-0 bg-secondary-dark text-white py-1 px-2 rounded-bl-md text-xs uppercase font-bold tracking-wide"
          >
            Sponsored Content
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            Join Simon & Schuster’s Virtual Fall 2024 Preview!
          </h3>
          <div class="text-sans-serif text-base mb-6 ml-4 mr-4">
            Hear from Simon & Schuster editors and marketing staff about new picture books, middle
            grade & teen novels. Guest speaker Jason Reynolds will talk about his new YA novel,
            <i>Twenty-four Seconds from Now…</i>
          </div>
        </div>
        <!-- Grid Promo Item 4 -->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://www.nea.org/sites/default/files/styles/640wide/public/2023-06/2022-pride-cover.jpg?itok=1YHn_8KT"
              alt="Pride Books"
              class="object-cover w-full h-auto rounded-md"
            />
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            LGBTQ+ Books for Schools
          </h3>
          <div class="text-sans-serif text-base mb-6 ml-4 mr-4">
            Recommended titles that reflect on the LGBTQ+ experience and books about Pride,
            tolerance, and diversity.
          </div>
        </div>
        <!-- Grid Promo Item 5-->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://www.nea.org/sites/default/files/styles/640wide/public/2022-12/bookschangeworld.jpg?itok=6ExYc2f3"
              alt="Pride Books"
              class="object-cover w-full h-auto rounded-md"
            />
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            What Do Students Want to Read? It Might Not Be What You Think
          </h3>

          <div class="grid-promo__promo-description u-sans-serif u-type-15 mb-6 ml-4 mr-4">
            Move over Dog Man! Make room for nonfiction books.
          </div>
        </div>
        <!-- Grid Promo Item 6 -->
        <div class="grid-promo mb-8 hover:bg-gray-100 shadow-md rounded-lg cursor-pointer">
          <div class="relative">
            <img
              src="https://miro.medium.com/v2/resize:fit:1400/1*OaXs37P7-GCGcDAY4cCbpw.jpeg"
              alt="Pride Books"
              class="object-cover w-full h-64 rounded-md"
            />
          </div>
          <h3 class="text-primary-title text-xl md:text-2xl font-bold mt-4 mb-2 ml-4 mr-4">
            Get Serious About Summer Reading
          </h3>
          <div class="text-sans-serif text-base mb-6 ml-4 mr-4">
            Use these ideas and resources to put good books into kids’ hands and connect them to
            vibrant summer learning adventures.
          </div>
        </div>
      </div>
    </div>
  </div>
</template>