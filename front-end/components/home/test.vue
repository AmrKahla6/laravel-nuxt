<template>
  <div>
    <Divider dashed><h2>Testimonials</h2></Divider>
    <Carousel v-model="value1" loop>
      <CarouselItem
        v-for="row in rows"
        :key="'test_' + row.id"
        style="text-align:center"
      >
        <div class="demo-carousel">
          <Row>
            <Col span="4" v-for="row in rows" :key="row.id">
              <Card style="margin:10px">
                <div style="text-align:center">
                  <Avatar :src="$images(row.image)" />
                  <h3>{{ row.name }}</h3>
                  <small>{{ row.project_type }}</small>
                  <p>{{ row.job_title }}</p>
                  <p>{{ row.comment }}</p>
                </div>
              </Card>
            </Col>
          </Row>
        </div>
      </CarouselItem>
    </Carousel>
  </div>
</template>
<script>
export default {
  data() {
    return {
      rows: [],
      loading: true,
      value1: 0
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.loading = true;
      let url = process.env.moduleUrl + "testimonials";
      this.$axios.$get(url).then(res => {
        this.rows = res.payload.data;
        this.loading = false;
      });
    }
  }
};
</script>
