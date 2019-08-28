<?php

namespace Laravel\Nova\Fields {

    class File
    {
        /**
         * Make the field keep the original name and extension of the uploaded file.
         *
         * If a duplicate is found, an underscore separated number is added to the file name.
         * If both keepOriginalName and storeAs are set, the one set later in the chain takes priority.
         *
         * @return $this
         */
        public function keepOriginalName()
        {
            return $this;
        }
    }
}
