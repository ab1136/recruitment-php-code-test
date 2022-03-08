<?php
    
    namespace App\Service;
    
    use think\LogManager;
    
    class AppLogger
    {
        const TYPE_LOG4PHP = 'log4php';
        const TYPE_THINKLOG = 'think-log';
        
        private $logger;
        
        public function __construct ($type = self::TYPE_LOG4PHP)
        {
            if($type == self::TYPE_LOG4PHP)
            {
                $this->logger = \Logger::getLogger( "Log" );
            }
            else if($type == self::TYPE_THINKLOG)
            {
                //THINK-LOG
                $this->logger = new LogManager();
            }
        }
        
        public function info ($message = '')
        {
            if($this->logger instanceof LogManager)
            {
                $this->logger->info( strtoupper( $message ) );
            }
            else
            {
                $this->logger->info( $message );
            }
        }
        
        public function debug ($message = '')
        {
            if($this->logger instanceof LogManager)
            {
                $this->logger->debug( strtoupper( $message ) );
            }
            else
            {
                $this->logger->debug( $message );
            }
        }
        
        public function error ($message = '')
        {
            if($this->logger instanceof LogManager)
            {
                $this->logger->error( strtoupper( $message ) );
            }
            else
            {
                $this->logger->error( $message );
            }
        }
    }