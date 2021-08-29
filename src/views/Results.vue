<template>
  <Layout>
    <Header  />
    <Content  />
    </Layout>

</template>

<script>
import Header from "./Header.vue"
import Content from "./mainContent.vue"

export default {
  components: {
    Header,
    Content
  },
}

</script>