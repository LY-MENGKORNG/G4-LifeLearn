<template>
  <WebLayout>
    <div
      class="hero-header hero--video bg-cover bg-left md:bg-center"
      style="
        background-image: url(https://www.foodpanda.com/wp-content/uploads/2023/03/fp-home-video-poster-1920x1080.jpg);
      "
    >
      <div class="bg-video">
        <video
          poster="https://www.foodpanda.com/wp-content/uploads/2023/03/fp-home-video-poster.jpg"
          id="player"
          class="bg-video__content"
          autoplay
          muted
          loop
          style="width: 100%; height: 40%;"
        >
          <source
            src="https://player.vimeo.com/progressive_redirect/playback/887673049/rendition/1080p/file.mp4?loc=external&amp;log_user=0&amp;signature=d2fb16e953bceb3394adfc2bdb6da0705e4fcfd9e7e60047193939fd2a7a7e46"
            type="video/mp4"
          />
        </video>
        <div
          class="absolute top-0 left-0 right-0 bottom-0 content-width flex p-4 md:p-16 xl:pb-20 justify-start items-end"
        >
          <div class="text-white p-4 md:p-12 md:w-2/3 text-left md:pl-0">
            <el-h2>lifeLearn<br />in a tap</el-h2>
            <div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Text Section -->
    <div class="section__text bg-white">
      <div class="section--inner">
        <div class="p-4 md:p-0">
          <h2 class="pt-12">
            We’re here to help you live life the panda way.<br />
            Spend more time doing what you love – we’ll take<br />
            care of tasty meals, fresh groceries and new flavours.
          </h2>
        </div>
      </div>
    </div>

    <!-- Image with Text Section -->
    <div class="section__image-text bg-white">
      <div class="content-width md:py-16 md:flex md:items-center justify-between">
        <div class="md:w-1/2 md:pr-8 lg:pr-16 mt-8 md:mt-0 order-1 md:order-1 md:pl-16">
          <el-card class="p-4">
            <h2>Meet the next generation of delivery!</h2>
            <p>
              What makes quick commerce quick? We stand for swift personalised delivery solutions
              for our customers, partners and employees. Learn how we empower authentic lifestyles
              and drive innovation across the globe.
            </p>
            <div class="pt-4">
              <el-button type="primary">read our story</el-button>
            </div>
          </el-card>
        </div>
        <div class="md:w-1/2 order-0 md:order-0">
          <el-image
            src="https://www.foodpanda.com/wp-content/uploads/2023/02/fp-home.jpg"
            fit="cover"
            style="width: 100%; height: 100%"
          ></el-image>
        </div>
      </div>
    </div>
  </WebLayout>
</template>
<script setup lang="ts">
import WebLayout from '@/Layouts/Web/WebLayout.vue'
import PrincipleLognin from '@/Components/Common/Auth/PrincipleLognin.vue'
</script>
