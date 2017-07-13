<template>
<div>
	<label> <slot></slot> Is Correct: <input type="checkbox"  name="is_correct" v-model="valueModel.is_correct"> </label>
        
	<tbvue-input name="text" id="in_answer" ref="text" placeholder="Answer" rules="required|max:140" v-model="valueModel.text">Text</tbvue-input>
	<tbvue-input name="text" id="in_answer" ref="explanation" placeholder="Answer" rules="max:140" v-model="valueModel.explenation">Explanation</tbvue-input>
</div>
</template>
<script>
export default {
    data() {
        return {
            valueModel: {
                text: "",
                explenation: "",
                is_correct: false
            },
            isInput: true,
            isValid: false
        }
    },

    methods: {
        validate() {
            this.isValid = true;
            this.$refs.text.validate();
            if (this.isValid) this.isValid = this.$refs.text.isValid;
            this.$refs.explanation.validate();
            if (this.isValid) this.isValid = this.$refs.explanation.isValid;
        },
        get() {
            return this.valueModel;
        }
    },
    watch: {
        value(value) {
            this.valueModel = value;
        }
    },
    props: {
        value: null
    }
}

</script>