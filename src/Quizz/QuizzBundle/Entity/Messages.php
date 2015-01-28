<?php

namespace Quizz\QuizzBundle\Entity;


class Messages {

    protected $id_message;

    protected $content_message;

    protected $subject_message;

    protected $key_sender;

    protected $key_receiver;


    /**
     * Get id_message
     *
     * @return integer 
     */
    public function getIdMessage()
    {
        return $this->id_message;
    }

    /**
     * Set content_message
     *
     * @param string $contentMessage
     * @return Messages
     */
    public function setContentMessage($contentMessage)
    {
        $this->content_message = $contentMessage;

        return $this;
    }

    /**
     * Get content_message
     *
     * @return string 
     */
    public function getContentMessage()
    {
        return $this->content_message;
    }

    /**
     * Set subject_message
     *
     * @param string $subjectMessage
     * @return Messages
     */
    public function setSubjectMessage($subjectMessage)
    {
        $this->subject_message = $subjectMessage;

        return $this;
    }

    /**
     * Get subject_message
     *
     * @return string 
     */
    public function getSubjectMessage()
    {
        return $this->subject_message;
    }

    /**
     * Set key_sender
     *
     * @param string $keySender
     * @return Messages
     */
    public function setKeySender($keySender)
    {
        $this->key_sender = $keySender;

        return $this;
    }

    /**
     * Get key_sender
     *
     * @return string 
     */
    public function getKeySender()
    {
        return $this->key_sender;
    }

    /**
     * Set key_receiver
     *
     * @param string $keyReceiver
     * @return Messages
     */
    public function setKeyReceiver($keyReceiver)
    {
        $this->key_receiver = $keyReceiver;

        return $this;
    }

    /**
     * Get key_receiver
     *
     * @return string 
     */
    public function getKeyReceiver()
    {
        return $this->key_receiver;
    }
}
