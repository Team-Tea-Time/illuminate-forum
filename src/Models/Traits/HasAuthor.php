<?php namespace TeamTeaTime\Forum\Models\Traits;

trait HasAuthor
{
    /**
     * Relationship: Author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(config('forum.integration.models.user'));
    }

    /**
     * Attribute: Author name.
     *
     * @return mixed
     */
    public function getAuthorNameAttribute()
    {
        $attribute = config('forum.integration.attributes.user.name');

        if (!is_null($this->author)) {
            return $this->author->$attribute;
        }

        return null;
    }
}
