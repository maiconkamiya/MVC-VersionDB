DROP FUNCTION IF EXISTS `fn_exists_procedure`;
CREATE FUNCTION `fn_exists_procedure`(in_name VARCHAR(255)) RETURNS BIT DETERMINISTIC BEGIN
    SELECT COUNT(1) INTO @f_result
    FROM information_schema.ROUTINES as info
    WHERE info.ROUTINE_SCHEMA = DATABASE() AND info.ROUTINE_TYPE = 'PROCEDURE' AND info.ROUTINE_NAME = in_name;

    RETURN @f_result;
END;